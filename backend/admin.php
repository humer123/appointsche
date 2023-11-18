<?php
include_once('database.php');

    class admin{
        public function viewAppointmentAdmin(){
            return $this->viewAppointmentAdminFunction();
        }

        public function viewAppointmentInCartAdmin(){
            return $this->viewAppointmentInCartAdminFunction();
        }

        public function allUsersAdmin(){
            return $this->allUsersAdminFunction();
        }

        public function updateUserAdmin($status, $userid){
            return $this->updateUserAdminFunction($status, $userid);
        }

        public function updateApproveAppointment($appId){
            return $this->approveAppointment($appId);
        }

        public function setAppointmentToUserAdmin($date, $message, $appId){
            return $this->setAppointmentToUserAdminFunction($date, $message, $appId);
        }

        private function viewAppointmentAdminFunction(){
            try {
                $db = new database();
                if($db->getStatus()){
                    $query = $db->getCon()->prepare($this->viewAppointmentAdminQuery());
                    $query->execute();
                    $db->closeConnection();
                    return json_encode($query->fetchAll());
                }else{
                    return 501;
                }
            } catch (PDOException $th) {
                throw $th;
            }
        }

        private function viewAppointmentInCartAdminFunction(){
            try {
                $db = new database();
                if($db->getStatus()){
                    $query = $db->getCon()->prepare($this->viewAppointmentInCartAdminQuery());
                    $query->execute();
                    $db->closeConnection();
                    return json_encode($query->fetchAll());
                }else{
                    return 501;
                }
            } catch (PDOException $th) {
                throw $th;
            }
        }

        private function allUsersAdminFunction(){
            try {
                $db = new database();
                if($db->getStatus()){
                    $query = $db->getCon()->prepare($this->allUsersAdminQuery());
                    $query->execute();
                    $db->closeConnection();
                    return json_encode($query->fetchAll());
                }else{
                    return 501;
                }
            } catch (PDOException $th) {
                throw $th;
            }
        }

        private function updateUserAdminFunction($status, $userid){
            try {
                $db = new database();
                if($db->getStatus()){
                    $query = $db->getCon()->prepare($this->updateUserAdminQuery());
                    $query->execute(array($status, $userid));
                    if(!$query->fetch()){
                        $db->closeConnection();
                        return 200;
                    }else{
                        $db->closeConnection();
                        return 400;
                    }
                }else{
                    return 501;
                }
            } catch (PDOException $th) {
                throw $th;
            }
        }

        private function setAppointmentToUserAdminFunction($date, $message, $appId){
            try {
                $db = new database();
                if($db->getStatus()){
                    $query = $db->getCon()->prepare($this->setAppointmentToUserAdminQuery());
                    $query->execute(array($date, $message, $appId));
                    if(!$query->fetch()){
                        $db->closeConnection();
                        return 200;
                    }else{
                        $db->closeConnection();
                        return 400;
                    }
                }else{
                    return 501;
                }
            } catch (PDOException $th) {
                throw $th;
            }
        }

        private function approveAppointment($appId){
            try {
                $db = new database();
                if($db->getStatus()){
                    $query = $db->getCon()->prepare($this->approveAppointmentQuery());
                    $query->execute(array($appId));

                    if(!$query->fetch()){
                        $db->closeConnection();
                        return 200;
                    }else{
                        $db->closeConnection();
                        return 400;
                    }
                }else{
                    return 501;
                }
            } catch (PDOException $th) {
                throw $th;
            }
        }

        private function viewAppointmentAdminQuery(){
            return "SELECT appointments.*, appointmentdate as ad, fullname as fn, user_id as id FROM `appointments` WHERE appointmentDate > 1";
        }

        private function viewAppointmentInCartAdminQuery(){
            return "SELECT * FROM `appointments` ORDER BY created_at DESC";
        }

        private function allUsersAdminQuery(){
            return "SELECT * FROM `users` WHERE role = 1 ORDER BY created DESC";
        }

        private function updateUserAdminQuery(){
            return "UPDATE `users` SET `status`= ? WHERE `user_id` = ?";
        }

        private function setAppointmentToUserAdminQuery(){
            return "UPDATE `appointments` SET `appointmentDate`= ? , `message` = ? WHERE `appointId` = ?";
        }

        private function approveAppointmentQuery(){
            return "UPDATE `appointments` set `status` = 1 WHERE appointId = ?";
        }
    }
?>