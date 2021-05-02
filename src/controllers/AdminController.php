<?php

namespace app\src\controllers;

use app\src\core\controller;

/**
 * AdminController
 */
class AdminController extends Controller
{
    private function isAdmin(){
        $isAdmin = (!empty($_SESSION)) ? $_SESSION['admin'] : false;
        if(!$isAdmin){
            $error = new ErrorController();
            $error->error_403();
        }
    }

    public function index(){
        $this->isAdmin();

        $userModel = "user";
        $this->loadModel($userModel);
        $usersCount = $this->$userModel->count();

        $coursModel = "cours";
        $this->loadModel($coursModel);
        $coursCount = $this->$coursModel->count();

        $categoriesModel = "categories";
        $this->loadModel($categoriesModel);
        $categoriesCount = $this->$categoriesModel->count();

        $qcmCount = [];

        $this->render('admin', 'index', [
            "usersCount" => (!empty($usersCount)) ? $usersCount[0] : "?",
            "coursCount" => (!empty($coursCount)) ? $coursCount[0] : "?",
            "categoriesCount" => (!empty($categoriesCount)) ? $categoriesCount[0] : "?",
            "qcmCount" => (!empty($qcmCount)) ? $qcmCount[0] : "?",
        ]);
    }

    public function utilisateurs(){
        $this->isAdmin();

        $userModel = "user";
        $this->loadModel($userModel);
        $users = $this->$userModel->getUsersAndRoles();

        $roleModel = "role";
        $this->loadModel($roleModel);
        $roles = $this->$roleModel->getAll();

        $this->render('admin', 'utilisateurs', [
            "users" => $users,
            "roles" => $roles,
            "adminCapacity" => $this,
        ]);
    }

    public function cours(){
        $this->isAdmin();

        $coursModel = "cours";
        $this->loadModel($coursModel);
        $courses = $this->$coursModel->getCoursFullInfos();

        $this->render('admin', 'cours', [
            "courses" => $courses,
            "adminCapacity" => $this,
        ]);
    }

    public function ajouter(string $slug){
        $this->isAdmin();
        
       switch ($slug) {
           case 'cours':
                $difficulteModel = "difficulte";
                $this->loadModel($difficulteModel);
                $difficulties = $this->$difficulteModel->getAll();

                $categoriesModel = "categories";
                $this->loadModel($categoriesModel);
                $categories = $this->$categoriesModel->getAll();

                $this->render('admin', 'ajoutCours', [
                    "difficulties" => $difficulties,
                    "categories" => $categories,
                    "adminCapacity" => $this,
                ]);
                break;
            case 'chapitre':
                    if (!empty($_POST['course_name']) || !empty($_POST['name'])) {
                        $this->render('admin', 'ajoutChapitre', [
                            "adminCapacity" => $this,
                        ]);
                    }else{
                        $error = new ErrorController();
                        $error->error_403();
                    }
                break;
           default:
                $error = new ErrorController();
                $error->error_404();
                break;
       }
    }

    public function deleteCourse($id){
        $coursModel = "cours";
        $this->loadModel($coursModel);
        $this->$coursModel->deleteUser($id);
        $refresh = '//' . HOST . '/' .FOLDER_ROOT . '/admin/cours'; 
        header('Location:'.$refresh);
    }

    public function deleteUser($id){
        $userModel = "user";
        $this->loadModel($userModel);
        $isAdmin = $this->$userModel->isAdmin($id);

        if(!$isAdmin){
            $this->$userModel->deleteUser($id);
            $refresh = '//' . HOST . '/' .FOLDER_ROOT . '/admin/utilisateurs'; 
            header('Location:'.$refresh);
        } else {
            $_GET['error'] = "L'utilisateur est un administrateur il ne peut pas être supprimé. Changez son rôle d'abord.";
        }
    }

    public function updateRole($id, $newRole){
        $userModel = "user";
        $this->loadModel($userModel);
        $isAdmin = $this->$userModel->isAdmin($id);
        $countAdmin = $this->$userModel->countAdmin();

        if(($isAdmin && $countAdmin > 1) || !$isAdmin){
            $this->$userModel->updateUserRole($id, $newRole);
            $refresh = '//' . HOST . '/' .FOLDER_ROOT . '/admin/utilisateurs'; 
            header('Location:'.$refresh);
        } else {
            $_GET['error'] = "Impossible de modifier le rôle de l'admin. Ajoutez un autre admin d'abord.";
        }
    }

    public function addCourse($name, $slug, $difficulty, $categories, $summary){
        $coursModel = "cours";
        $this->loadModel($coursModel);
        $courses = $this->$coursModel->addCourse($name, $slug, $difficulty, $categories, $summary);
        //TODO gérer les cours déjà existants
    }

    public function addChapter($lesson, $name, $slug, $content){
        $coursModel = "cours";
        $this->loadModel($coursModel);
        $courses = $this->$coursModel->addChapter($lesson, $name, $slug, $content);
    }
}