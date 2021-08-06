<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Internaute extends Model
{
    public function tutors()
    {
        $users = User::orderBy('id', 'DESC')->get();

        $results = [];

        foreach ($users as $user) {
            if ($user->roles) {
                foreach ($user->roles as $value) {
                    if ($value->slug === 'tuteur') {
                        $results[] = $user;
                    }
                }
            }
        }

        return $results;
    }

    public function students()
    {
        $users = User::orderBy('id', 'DESC')->get();

        $results = [];

        foreach ($users as $user) {
            if ($user->roles) {
                foreach ($user->roles as $value) {
                    if ($value->slug === 'apprenant') {
                        $results[] = $user;
                    }
                }
            }
        }

        return $results;
    }

    public function personal()
    {
        $users = User::orderBy('id', 'DESC')->get();

        $results = [];

        foreach ($users as $user) {
            if ($user->roles) {
                foreach ($user->roles as $value) {
                    if ($value->slug !== 'apprenant' && $value->slug !== 'tuteur' && $value->slug !== 'enseignant') {
                        $results[] = $user;
                    }
                }
            }
        }

        return $results;
    }

    public function studentsByClassId($class_id)
    {
        $results = [];
        $class = Classe::where('id', $class_id)->first();

        foreach ($class->students as $user) {
            if ($user->roles) {
                foreach ($user->roles as $value) {
                    if ($value->slug === 'apprenant') {
                        $results[] = $user;
                    }
                }
            }
        }

        return $results;
    }

    public function enseignants()
    {
        $users = User::orderBy('id', 'DESC')->get();

        $results = [];

        foreach ($users as $user) {
            if ($user->roles) {
                foreach ($user->roles as $value) {
                    if ($value->slug === 'enseignant') {
                        $results[] = $user;
                    }
                }
            }
        }

        return $results;
    }

    public function appreciation($note)
    {
        $response = "";

        if ($note <= 20 && $note >= 17) {
            $response = "Excellent";
        } else if ($note < 17 && $note >= 16) {
            $response = "Très Bien";
        } else if ($note < 16 && $note >= 14) {
            $response = "Bien";
        } else if ($note < 14 && $note >= 12) {
            $response = "Assez Bien";
        } else if ($note < 12 && $note >= 10) {
            $response = "Passable";
        } else if ($note < 10 && $note >= 8) {
            $response = "Insuffisant";
        } else if ($note < 8 && $note >= 6) {
            $response = "Faible";
        } else {
            $response = "Médiocre";
        }

        return $response;
    }

    public function distinctionAndSanction($moyenne)
    {
        $response = "";

        if ($moyenne >= 20 && $moyenne >= 17) {
            $response = "Tableau d'Excellence";
        } else if ($moyenne < 17 && $moyenne >= 16) {
            $response = "Tableau d'Honneur + Félicitations";
        } else if ($moyenne < 16 && $moyenne >= 15) {
            $response = "Tableau d'Honneur + Encouragements";
        } else if ($moyenne < 15 && $moyenne >= 14) {
            $response = "Tableau d'Honneur";
        } else if ($moyenne < 10 && $moyenne >= 7) {
            $response = "Avertissement";
        } else if ($moyenne < 7) {
            $response = "Blâme";
        }

        return $response;
    }

    public function anneeScolaire()
    {
        return SchoolYear::where('status', 1)->first();
    }

    public function ecole()
    {
        return School::orderBy('id', 'DESC')->first();
    }

    public function getToDay()
    {
        $today = date("D");
        $result = "";
        if ($today === "Mon") {
            $result = "Lundi";
        } else if ($today === "Tue") {
            $result = "Mardi";
        } else if ($today === "Wed") {
            $result = "Mercredi";
        } else if ($today === "Thu") {
            $result = "Jeudi";
        } else if ($today === "Fri") {
            $result = "Vendredi";
        } else if ($today === "Sat") {
            $result = "Samedi";
        } else if ($today === "Sun") {
            $result = "Dimanche";
        }

        return $result;
    }

    public function getCourses()
    {
        return Cours::where('jour', $this->getToDay())->orderBy('debut', 'ASC')->get();
    }

    public function getBoysAndGirls()
    {
        $data = [];
        $girls = 0;
        $boys = 0;

        foreach ($this->students() as $student) {
            if ($student->sexe === "Masculin")
                $boys++;
            else
                $girls++;
        }

        $data[] = $boys;
        $data[] = $girls;

        return json_encode($data);
    }

    public function teacherTimetable()
    {
        $courses = Cours::where('user_id', Auth::user()->id)->get();

        $tabHours = [];
        $jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];

        for ($i = 8; $i < 18; $i++) {
            $tabHours[] = ["debut" => $i, "fin" => $i + 1, "courses" => []];
        }

        if ($courses) {
            foreach ($tabHours as $index => $hour) {
                foreach ($courses as $cours) {
                    $heureDebut = date_create_from_format("H:i:s", $cours->debut)->format("H");
                    $heureFin = date_create_from_format("H:i:s", $cours->fin)->format("H");

                    if (intval($heureDebut) == $hour["debut"] || intval($heureFin) == $hour["fin"]) {
                        $tabHours[$index]["courses"][] = $cours;
                    } else if (intval($heureDebut) <= $hour["debut"] && intval($heureFin) >= $hour["fin"]) {
                        $tabHours[$index]["courses"][] = $cours;
                    }
                }
            }
            // dd($tabHours);
        }

        return ["hours" => $tabHours, "jours" => $jours];
    }

    public function studentTimetable()
    {
        if (!Auth::user()->isStudent()) {
            return null;
        }
        $class = $this->lastItem(Auth::user()->classes);

        $courses = Cours::where('classe_id', $class->id)->get();

        $tabHours = [];
        $jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];

        for ($i = 8; $i < 18; $i++) {
            $tabHours[] = ["debut" => $i, "fin" => $i + 1, "courses" => []];
        }

        if ($courses) {
            foreach ($tabHours as $index => $hour) {
                foreach ($courses as $cours) {
                    $heureDebut = date_create_from_format("H:i:s", $cours->debut)->format("H");
                    $heureFin = date_create_from_format("H:i:s", $cours->fin)->format("H");

                    if (intval($heureDebut) == $hour["debut"] || intval($heureFin) == $hour["fin"]) {
                        $tabHours[$index]["courses"][] = $cours;
                    } else if (intval($heureDebut) <= $hour["debut"] && intval($heureFin) >= $hour["fin"]) {
                        $tabHours[$index]["courses"][] = $cours;
                    }
                }
            }
            // dd($tabHours);
        }

        return ["hours" => $tabHours, "jours" => $jours];
    }

    public function lastItem($classes)
    {
        $class = false;

        foreach ($classes as $value) {
            $class = $value;
        }
        return $class;
    }
}
