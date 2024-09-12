<?php
    define("OFFSET",4);
    function findUser($username,$password){
        global $conn;
        $query = "SELECT * FROM users WHERE username = ? AND password= ?;";
        $result = $conn->prepare($query);
        $result->execute([$username, $password]);
        $response=$result->fetch();
        return $response;
    }
    function showMenuForStaffMember(){
        global $conn;
        $signInId = 4;
        $signUpId = 5;
        $query = "SELECT id, href, label FROM menudata WHERE id!= ? AND id!= ?;";
        $result = $conn->prepare($query);
        $result->execute([$signInId, $signUpId]);
        $response=$result->fetchAll();
        return $response;
    }
    function showMenuForCommunityMember(){
        global $conn;
        $signInId = 4;
        $signUpId = 5;
        $dashboardId = 7;
        $query = "SELECT id, href, label FROM menudata WHERE id!= ? AND id!= ? AND id!= ?;";
        $result = $conn->prepare($query);
        $result->execute([$signInId, $signUpId, $dashboardId]);
        $response=$result->fetchAll();
        return $response;
    }
    function showMenuForNonSignedInUser(){
        global $conn;
        $signOutId = 6;
        $dashboardId = 7;
        $contributeId = 9;
        $query = "SELECT id, href, label FROM menudata WHERE id!= ? AND id!= ? AND id!= ?;";
        $result = $conn->prepare($query);
        $result->execute([$signOutId,$dashboardId,$contributeId]);
        $response=$result->fetchAll();
        return $response;
    }
    function changingPassword($username,$newPassword){
        global $conn;
        $query = "UPDATE users SET password= ? WHERE username= ?;";
        $result = $conn->prepare($query);
        $response = $result->execute([$newPassword,$username]);
        return $response;
    }
    function deletingSigningInAttempts($userId){
        global $conn;
        $query = "DELETE FROM wrongsigninginattempts WHERE userId=?;";
        $result = $conn->prepare($query);
        $response = $result->execute([$userId]);
        return $response;
    }
    function lockingUser($userId){
        global $conn;
        $locked = 1;
        $query = "UPDATE users SET locked= ? WHERE id= ?;";
        $result = $conn->prepare($query);
        $response = $result->execute([$locked,$userId]);
        return $response;
    }
    function increaseNumberOfWrongSigningInAttempts($userId){
        global $conn;
        $query = "INSERT INTO wrongsigninginattempts(userId) VALUES(?);";
        $result = $conn->prepare($query);
        $response = $result->execute([$userId]);
        return $response;
    }
    function getNumberOfWrongSigningInAttemptsInTheLastFiveMinutes($dateAndTime,$userId){
        global $conn;
        $query = "SELECT COUNT(*) AS numberOfWrongSigningInAttemptsInTheLastFiveMinutes FROM wrongsigninginattempts WHERE dateAndTime > ? AND userId = ?;";
        $result = $conn->prepare($query);
        $result->execute([$dateAndTime,$userId]);
        $response = $result->fetch();
        return $response;
    }
    function changingReport($reportId,$title,$carName,$carImage,$carThumbImage,$sizeId,$manufacturerId,$countryId,$epochId,$reportKernel){
        global $conn;
        $query = "UPDATE reports SET title=?,carName=?,carImage=?,carThumbImage=?,sizeId=?,manufacturerId=?,countryId=?,epochId=?,reportKernel=? WHERE reportId= ?;";
        $result = $conn->prepare($query);
        $response = $result->execute([$title,$carName,$carImage,$carThumbImage,$sizeId,$manufacturerId,$countryId,$epochId,$reportKernel,$reportId]);
        return $response;
    }
    function changingUser($userId,$firstName,$lastName,$emailAddress,$username,$password,$roleId,$locked){
        global $conn;
        $query = "UPDATE users SET firstName=?,lastName=?,emailAddress=?,username=?,password=?,roleId=?,locked=? WHERE id=?;";
        $result = $conn->prepare($query);
        $response = $result->execute([$firstName,$lastName,$emailAddress,$username,$password,$roleId,$locked,$userId]);
        return $response;
    }
    function getSizeId($size){
        global $conn;
        $query = "SELECT * FROM sizes WHERE sizeName= ?;";
        $result = $conn->prepare($query);
        $result->execute([$size]);
        $response=$result->fetch();
        return $response;
    }
    function getManufacturerId($manufacturer){
        global $conn;
        $query = "SELECT * FROM manufacturers WHERE manufacturerName= ?;";
        $result = $conn->prepare($query);
        $result->execute([$manufacturer]);
        $response=$result->fetch();
        return $response;
    }
    function getRoleId($role){
        global $conn;
        $query = "SELECT * FROM roles WHERE roleName= ?;";
        $result = $conn->prepare($query);
        $result->execute([$role]);
        $response=$result->fetch();
        return $response;
    }
    function getCountryId($country){
        global $conn;
        $query = "SELECT * FROM countries WHERE countryName= ?;";
        $result = $conn->prepare($query);
        $result->execute([$country]);
        $response=$result->fetch();
        return $response;
    }
    function getEpochId($epoch){
        global $conn;
        $query = "SELECT * FROM epochs WHERE epochName= ?;";
        $result = $conn->prepare($query);
        $result->execute([$epoch]);
        $response=$result->fetch();
        return $response;
    }
    function getReports(){
        global $conn;
        $query = "SELECT title,carName,sizeName,manufacturerName,countryName,epochName,reportKernel FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id;";
        $data = $conn->query($query);
        return $data;
    }
    function findReport($reportId){
        global $conn;
        $query = "SELECT * FROM reports WHERE reportId= ?;";
        $result = $conn->prepare($query);
        $result->execute([$reportId]);
        $response=$result->fetch();
        return $response;
    }
    function emailAddressExists($emailAddress){
        global $conn;
        $query = "SELECT * FROM users WHERE emailAddress = ?;";
        $result = $conn->prepare($query);
        $result->execute([$emailAddress]);
        $response=$result->fetch();
        return $response;
    }
    function usernameExists($username){
        global $conn;
        $query = "SELECT * FROM users WHERE username = ?;";
        $result = $conn->prepare($query);
        $result->execute([$username]);
        $response=$result->fetch();
        return $response;
    }
    function sizeExists($size){
        global $conn;
        $query = "SELECT * FROM sizes WHERE sizeName = ?;";
        $result = $conn->prepare($query);
        $result->execute([$size]);
        $response = $result->fetch();
        return $response;
    }
    function manufacturerExists($manufacturer){
        global $conn;
        $query = "SELECT * FROM manufacturers WHERE manufacturerName = ?;";
        $result = $conn->prepare($query);
        $result->execute([$manufacturer]);
        $response = $result->fetch();
        return $response;
    }
    function countryExists($country){
        global $conn;
        $query = "SELECT * FROM countries WHERE countryName = ?;";
        $result = $conn->prepare($query);
        $result->execute([$country]);
        $response = $result->fetch();
        return $response;
    }
    function epochExists($epoch){
        global $conn;
        $query = "SELECT * FROM epochs WHERE epochName = ?;";
        $result = $conn->prepare($query);
        $result->execute([$epoch]);
        $response = $result->fetch();
        return $response;
    }
    function roleExists($role){
        global $conn;
        $query = "SELECT * FROM roles WHERE roleName = ?;";
        $result = $conn->prepare($query);
        $result->execute([$role]);
        $response = $result->fetch();
        return $response;
    }
    function addingRole($role){
        global $conn;
        $query = "INSERT INTO roles(roleName) VALUES(?);";
        $result = $conn->prepare($query);
        $response = $result->execute([$role]);
        return $response;
    }
    function addingSize($size){
        global $conn;
        $query = "INSERT INTO sizes(sizeName) VALUES(?);";
        $result = $conn->prepare($query);
        $response = $result->execute([$size]);
        return $response;
    }
    function addingManufacturer($manufacturer){
        global $conn;
        $query = "INSERT INTO manufacturers(manufacturerName) VALUES(?);";
        $result = $conn->prepare($query);
        $response = $result->execute([$manufacturer]);
        return $response;
    }
    function addingCountry($country){
        global $conn;
        $query = "INSERT INTO countries(countryName) VALUES(?);";
        $result = $conn->prepare($query);
        $response = $result->execute([$country]);
        return $response;
    }
    function addingEpoch($epoch){
        global $conn;
        $query = "INSERT INTO epochName(epochName) VALUES(?);";
        $result = $conn->prepare($query);
        $response = $result->execute([$size]);
        return $response;
    }
    function insertUser($firstName,$lastName,$emailAddress,$username,$password,$roleId){
        global $conn;
        $query = "INSERT INTO users(firstName,lastName,emailAddress,username,password,roleId) VALUES(?,?,?,?,?,?);";
        $result = $conn->prepare($query);
        $response = $result->execute([$firstName,$lastName,$emailAddress,$username,$password,$roleId]);
        return $response;
    }
    function insertingReport($title,$carName,$carImageName,$carThumbImageName,$sizeId,$manufacturerId,$countryId,$epochId,$reportKernel){
        global $conn;
        $query = "INSERT INTO reports(title,carName,carImage,carThumbImage,sizeId,manufacturerId,countryId,epochId,reportKernel) VALUES(?,?,?,?,?,?,?,?,?);";
        $result = $conn->prepare($query);
        $response = $result->execute([$title,$carName,$carImageName,$carThumbImageName,$sizeId,$manufacturerId,$countryId,$epochId,$reportKernel]);
        return $response;
    }
    function sendingMessage($firstName,$lastName,$emailAddress,$subjectId,$message){
        global $conn;
        $query = "INSERT INTO messages(firstName,lastName,emailAddress,subjectId,message) VALUES(?,?,?,?,?);";
        $result = $conn->prepare($query);
        $response = $result->execute([$firstName,$lastName,$emailAddress,$subjectId,$message]);
        return $response;
    }
    function contributing($carName,$carManufacturer,$carEpoch,$carImage,$userId){
        global $conn;
        $query = "INSERT INTO contributions(carName,carManufacturer,carEpoch,carImage,userId) VALUES(?,?,?,?,?);";
        $result = $conn->prepare($query);
        $response = $result->execute([$carName,$carManufacturer,$carEpoch,$carImage,$userId]);
        return $response;
    }
    function postingComment($userId,$comment,$dateAndTime,$reportId){
        global $conn;
        $query = "INSERT INTO comments(userId,comment,dateAndTime,reportId) VALUES(?,?,?,?);";
        $result = $conn->prepare($query);
        $response = $result->execute([$userId,$comment,$dateAndTime,$reportId]);
        return $response;
    }
    function showCarousel(){
        global $conn;
        $query = "SELECT * FROM carouseldata;";
        $data = $conn->query($query)->fetchAll();
        return $data;
    }
    function showSubjects(){
        global $conn;
        $query = "SELECT * FROM subjects;";
        $data = $conn->query($query)->fetchAll();
        return $data;
    }
    function showUsers(){
        global $conn;
        $query = "SELECT u.id AS userId,firstName,lastName,emailAddress,username,password,roleName,locked FROM users u INNER JOIN roles r ON u.roleId=r.id;";
        $data = $conn->query($query)->fetchAll();
        return $data;
    }
    function showFooterLinks(){
        global $conn;
        $query = "SELECT * FROM footerlinks;";
        $data = $conn->query($query)->fetchAll();
        return $data;
    }
    function showSizes(){
        global $conn;
        $query = "SELECT * FROM sizes;";
        $data = $conn->query($query)->fetchAll();
        return $data;
    }
    function showManufacturers(){
        global $conn;
        $query = "SELECT * FROM manufacturers;";
        $data = $conn->query($query)->fetchAll();
        return $data;
    }
    function showCountries(){
        global $conn;
        $query = "SELECT * FROM countries;";
        $data = $conn->query($query)->fetchAll();
        return $data;
    }
    function showSortingCategories(){
        global $conn;
        $query = "SELECT * FROM sortingCategories;";
        $data = $conn->query($query)->fetchAll();
        return $data;
    }
    function showEpochs(){
        global $conn;
        $query = "SELECT * FROM epochs;";
        $data = $conn->query($query)->fetchAll();
        return $data;
    }
    function showComments($reportId){
        global $conn;
        $query = "SELECT * FROM comments c INNER JOIN users u ON c.userId=u.id WHERE reportId = ?;";
        $result = $conn->prepare($query);
        $result->execute([$reportId]);
        $response=$result->fetchAll();
        return $response;
    }
    function showAuthorInformation(){
        global $conn;
        $query ="SELECT * FROM authorinformation;";
        $data = $conn->query($query)->fetchAll();
        return $data;
    }
    function showAuthorInformation2($pieceOfInformationId){
        global $conn;
        $query ="SELECT * FROM authorinformation2 WHERE pieceOfInformationId=?;";
        $result = $conn->prepare($query);
        $result->execute([$pieceOfInformationId]);
        $response=$result->fetchAll();
        return $response;
    }
    function deletingComments($reportId,$commentLineToDelete){
        global $conn;
        $commentLineToDeleteQueryString = implode(',', array_fill(0, count($commentLineToDelete), '?'));
        $query = "DELETE FROM comments WHERE reportId=? AND commentId IN (".$commentLineToDeleteQueryString.");";
        $result = $conn->prepare($query);
        $response = $result->execute(array_merge([$reportId],$commentLineToDelete));
        return $response;
    }
    function deletingReport($reportId){
        global $conn;
        $query = "DELETE FROM reports WHERE reportId=?;";
        $result = $conn->prepare($query);
        $response = $result->execute([$reportId]);
        return $response;
    }
    function deletingUsers($userLineToDelete){
        global $conn;
        $userIdsQueryString = implode(',', array_fill(0, count($userLineToDelete), '?'));
        $query = "DELETE FROM users WHERE id IN (".$userIdsQueryString.");";
        $result = $conn->prepare($query);
        $response = $result->execute($userLineToDelete);
        return $response;
    }
    function showReports($sizeIds,$manufacturerIds,$countryIds,$epochIds,$name,$sortingCategoryId,$limit){
        global $conn;
        $limit = ((int)$limit) * OFFSET;
        $offset = OFFSET;
        if($sizeIds==null && $manufacturerIds==null && $countryIds==null && $countryIds==null && $epochIds==null && $name==null){
            //0000
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute([$limit,$offset]);
        }
        if($sizeIds==null && $manufacturerIds==null && $countryIds==null && $epochIds==null && $name!=null){
            //0001
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute([$name,$limit,$offset]);
        }
        if($sizeIds==null && $manufacturerIds==null && $countryIds==null && $epochIds!=null && $name==null){
            //0010
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE epochId IN (".$epochIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE epochId IN (".$epochIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE epochId IN (".$epochIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE epochId IN (".$epochIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE epochId IN (".$epochIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($epochIds,[$limit,$offset]));
        }
        if($sizeIds==null && $manufacturerIds==null && $countryIds==null && $epochIds!=null && $name!=null){
            //0011
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($epochIds,[$name,$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds==null && $epochIds==null && $name==null){
            //0100
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,[$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds!=null && $epochIds==null && $name==null){
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$countryIds,[$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds==null && $countryIds!=null && $epochIds==null && $name==null){
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($countryIds,[$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds==null && $epochIds==null && $name!=null){
            //0101
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,[$name,$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds!=null && $epochIds==null && $name!=null){
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$countryIds,[$name,$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds==null && $countryIds!=null && $epochIds==null && $name!=null){
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($countryIds,[$name,$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds==null && $epochIds!=null && $name==null){
            //0110
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$epochIds,[$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds!=null && $epochIds!=null && $name==null){
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$countryIds,$epochIds,[$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds==null && $countryIds!=null && $epochIds!=null && $name==null){
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($countryIds,$epochIds,[$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds==null && $epochIds!=null && $name!=null){
            //0111
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$epochIds,[$name,$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds!=null && $epochIds!=null && $name!=null){
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$countryIds,$epochIds,[$name,$limit,$offset]));
        }
        if($sizeIds==null  && $manufacturerIds==null && $countryIds!=null && $epochIds!=null && $name!=null){
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($countryIds,$epochIds,[$name,$limit,$offset]));
        }
        if($sizeIds!=null && $manufacturerIds==null && $countryIds==null && $epochIds==null && $name==null){
            //1000
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,[$limit,$offset]));
        }
        if($sizeIds!=null && $manufacturerIds==null && $countryIds==null && $epochIds==null && $name!=null){
            //1001
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,[$name,$limit,$offset]));
        }
        if($sizeIds!=null && $manufacturerIds==null && $countryIds==null && $epochIds!=null && $name==null){
            //1010
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$epochIds,[$limit,$offset]));
        }
        if($sizeIds!=null && $manufacturerIds==null && $countryIds==null && $epochIds!=null && $name!=null){
            //1011
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$epochIds,[$name,$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds==null && $epochIds==null && $name==null){
            //1100
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,[$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds!=null && $epochIds==null && $name==null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$countryIds,[$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds==null && $countryIds!=null && $epochIds==null && $name==null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$countryIds,[$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds==null && $epochIds==null && $name!=null){
            //1101
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,[$name,$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds!=null && $epochIds==null && $name!=null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$countryIds,[$name,$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds==null && $countryIds!=null && $epochIds==null && $name!=null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$countryIds,[$name,$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds==null && $epochIds!=null && $name==null){
            //1110
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$epochIds,[$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds!=null && $epochIds!=null && $name==null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$countryIds,$epochIds,[$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds==null && $countryIds!=null && $epochIds!=null && $name==null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$countryIds,$epochIds,[$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds==null && $epochIds!=null && $name!=null){
            //1111
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$epochIds,[$name,$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds==null && $countryIds!=null && $epochIds!=null && $name!=null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$countryIds,$epochIds,[$name,$limit,$offset]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds!=null && $epochIds!=null && $name!=null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            if($sortingCategoryId==1){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==2){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY carName DESC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==3){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId ASC LIMIT ?, ?;";
            }
            else if($sortingCategoryId==4){
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) ORDER BY epochId DESC LIMIT ?, ?;";
            }
            else {
                $query = "SELECT * FROM reports r INNER JOIN sizes s ON r.sizeId=s.id INNER JOIN manufacturers m ON r.manufacturerId = m.id INNER JOIN countries c ON r.countryId = c.id INNER JOIN epochs e ON r.epochId=e.id WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%')) LIMIT ?, ?;";
            }
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$countryIds,$epochIds,[$name,$limit,$offset]));
        }
        $response=$result->fetchAll();
        return $response;
    }
    function showNumberOfReports($sizeIds,$manufacturerIds,$countryIds,$epochIds,$name){
        global $conn;
        if($sizeIds==null && $manufacturerIds==null && $countryIds==null && $epochIds==null && $name==null){
            //0000
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports;";
            $result = $conn->query($query);
        }
        if($sizeIds==null && $manufacturerIds==null && $countryIds==null && $epochIds==null && $name!=null){
            //0001
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute([$name]);
        }
        if($sizeIds==null && $manufacturerIds==null && $countryIds==null && $epochIds!=null && $name==null){
            //0010
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE epochId IN (".$epochIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute($epochIds);
        }
        if($sizeIds==null && $manufacturerIds==null && $countryIds==null && $epochIds!=null && $name!=null){
            //0011
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($epochIds,[$name]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds==null && $epochIds==null && $name==null){
            //0100
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE manufacturerId IN (".$manufacturerIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute($manufacturerIds);
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds!=null && $epochIds==null && $name==null){
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$countryIds));
        }
        if($sizeIds==null  && $manufacturerIds==null && $countryIds!=null && $epochIds==null && $name==null){
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE countryId IN (".$countryIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute($countryIds);
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds==null && $epochIds==null && $name!=null){
            //0101
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,[$name]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds!=null && $epochIds==null && $name!=null){
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$countryIds,[$name]));
        }
        if($sizeIds==null  && $manufacturerIds==null && $countryIds!=null && $epochIds==null && $name!=null){
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($countryIds,[$name]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds==null && $epochIds!=null && $name==null){
            //0110
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$epochIds));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds!=null && $epochIds!=null && $name==null){
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$countryIds,$epochIds));
        }
        if($sizeIds==null  && $manufacturerIds==null && $countryIds!=null && $epochIds!=null && $name==null){
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute(array_merge($countryIds,$epochIds));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds==null && $epochIds!=null && $name!=null){
            //0111
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$epochIds,[$name]));
        }
        if($sizeIds==null  && $manufacturerIds!=null && $countryIds!=null && $epochIds!=null && $name!=null){
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($manufacturerIds,$countryIds,$epochIds,[$name]));
        }
        if($sizeIds==null  && $manufacturerIds==null && $countryIds!=null && $epochIds!=null && $name!=null){
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($countryIds,$epochIds,[$name]));
        }
        if($sizeIds!=null && $manufacturerIds==null && $countryIds==null && $epochIds==null && $name==null){
            //1000
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute($sizeIds);
        }
        if($sizeIds!=null && $manufacturerIds==null && $countryIds==null && $epochIds==null && $name!=null){
            //1001
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,[$name]));
        }
        if($sizeIds!=null && $manufacturerIds==null && $countryIds==null && $epochIds!=null && $name==null){
            //1010
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$epochIds));
        }
        if($sizeIds!=null && $manufacturerIds==null && $countryIds==null && $epochIds!=null && $name!=null){
            //1011
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$epochIds,[$name]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds==null && $epochIds==null && $name==null){
            //1100
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds!=null && $epochIds==null && $name==null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$countryIds));
        }
        if($sizeIds!=null  && $manufacturerIds==null && $countryIds!=null && $epochIds==null && $name==null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$countryIds));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds==null && $epochIds==null && $name!=null){
            //1101
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,[$name]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds!=null && $epochIds==null && $name!=null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$countryIds,[$name]));
        }
        if($sizeIds!=null  && $manufacturerIds==null && $countryIds!=null && $epochIds==null && $name!=null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$countryIds,[$name]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds==null && $epochIds!=null && $name==null){
            //1110
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$epochIds));
        }
        if($sizeIds!=null  && $manufacturerIds==null && $countryIds!=null && $epochIds!=null && $name==null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$countryIds,$epochIds));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds!=null && $epochIds!=null && $name==null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.");";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$countryIds,$epochIds));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds==null && $epochIds!=null && $name!=null){
            //1111
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$epochIds,[$name]));
        }
        if($sizeIds!=null  && $manufacturerIds!=null && $countryIds!=null && $epochIds!=null && $name!=null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $manufacturerIdsQueryString = implode(',', array_fill(0, count($manufacturerIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND manufacturerId IN (".$manufacturerIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$manufacturerIds,$countryIds,$epochIds,[$name]));
        }
        if($sizeIds!=null  && $manufacturerIds==null && $countryIds!=null && $epochIds!=null && $name!=null){
            $sizeIdsQueryString = implode(',', array_fill(0, count($sizeIds), '?'));
            $countryIdsQueryString = implode(',', array_fill(0, count($countryIds), '?'));
            $epochIdsQueryString = implode(',', array_fill(0, count($epochIds), '?'));
            $query = "SELECT COUNT(*) AS numberOfReports FROM reports WHERE sizeId IN (".$sizeIdsQueryString.") AND countryId IN (".$countryIdsQueryString.") AND epochId IN (".$epochIdsQueryString.") AND carName LIKE UPPER(CONCAT( '%', ? , '%'));";
            $result = $conn->prepare($query);
            $result->execute(array_merge($sizeIds,$countryIds,$epochIds,[$name]));
        }
        $response=$result->fetch();
        return $response;
    }
?>