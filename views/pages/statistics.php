<?php
    if($_SESSION['user']->roleId==1){
    $page = "statistics";
?>
<div class="container-fluid lightYellowBackgroundColor pt-5 pt-md-0">
    <div class="container pt-5 pt-md-0">
        <div class="row">
            <div class="col-12 pt-5 pb-5">
                <h3 class="text-center blackColor">Site access per page in the last 24 hours:</h3>
                <?php
                    $accessLogs = file("data/accessLog.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    $absoluteNumberOfVisitsToIndex = 0;
                    $absoluteNumberOfVisitsToReports = 0;
                    $absoluteNumberOfVisitsToAuthor = 0;
                    $absoluteNumberOfVisitsToDashboard = 0;
                    $absoluteNumberOfVisitsToFourHundredAndFour = 0;
                    $absoluteNumberOfVisitsToContribute = 0;
                    $absoluteNumberOfVisitsToCrudReports = 0;
                    $absoluteNumberOfVisitsToCrudUsers = 0;
                    $absoluteNumberOfVisitsToSignIn = 0;
                    $absoluteNumberOfVisitsToSignUp = 0;
                    $absoluteNumberOfVisitsToStatistics = 0;
                    $relativeNumberOfVisitsToIndex = 0;
                    $relativeNumberOfVisitsToReports = 0;
                    $relativeNumberOfVisitsToAuthor = 0;
                    $relativeNumberOfVisitsToDashboard = 0;
                    $relativeNumberOfVisitsToFourHundredAndFour = 0;
                    $relativeNumberOfVisitsToContribute = 0;
                    $relativeNumberOfVisitsToCrudReports = 0;
                    $relativeNumberOfVisitsToCrudUsers = 0;
                    $relativeNumberOfVisitsToSignIn = 0;
                    $relativeNumberOfVisitsToSignUp = 0;
                    $relativeNumberOfVisitsToStatistics = 0;
                    $numberOfUsersSignedInToday = 0;
                    foreach($accessLogs as $log){
                        $partsOfLog = explode(";",$log);
                        if($partsOfLog[1]=="index"){
                            $absoluteNumberOfVisitsToIndex++;
                        }
                        if($partsOfLog[1]=="reports"){
                            $absoluteNumberOfVisitsToReports++;
                        }
                        if($partsOfLog[1]=="author"){
                            $absoluteNumberOfVisitsToAuthor++;
                        }
                        if($partsOfLog[1]=="dashboard"){
                            $absoluteNumberOfVisitsToDashboard++;
                        }
                        if($partsOfLog[1]=="sign in"){
                            $absoluteNumberOfVisitsToSignIn++;
                        }
                        if($partsOfLog[1]=="sign up"){
                            $absoluteNumberOfVisitsToSignUp++;
                        }
                        if($partsOfLog[1]=="404"){
                            $absoluteNumberOfVisitsToFourHundredAndFour++;
                        }
                        if($partsOfLog[1]=="crud reports"){
                            $absoluteNumberOfVisitsToCrudReports++;
                        }
                        if($partsOfLog[1]=="crud users"){
                            $absoluteNumberOfVisitsToCrudUsers++;
                        }
                        if($partsOfLog[1]=="contribute"){
                            $absoluteNumberOfVisitsToContribute++;
                        }
                        if($partsOfLog[1]=="statistics"){
                            $absoluteNumberOfVisitsToStatistics++;
                        }
                        // if(strtotime($partsOfLog[4])>date('Y-m-d h:i:s A', strtotime("-1 day"))&&$partsOfLog[3]=="true"){
                        //     $usersSignedInToday++;
                        // }
                    }
                    $absoluteNumberOfSiteVisits = $absoluteNumberOfVisitsToIndex+$absoluteNumberOfVisitsToReports+$absoluteNumberOfVisitsToAuthor+$absoluteNumberOfVisitsToDashboard+$absoluteNumberOfVisitsToSignIn+$absoluteNumberOfVisitsToSignUp+$absoluteNumberOfVisitsToFourHundredAndFour+$absoluteNumberOfVisitsToCrudReports+$absoluteNumberOfVisitsToCrudUsers+$absoluteNumberOfVisitsToContribute+$absoluteNumberOfVisitsToStatistics;
                    if($absoluteNumberOfVisitsToReports!=0){
                        $relativeNumberOfVisitsToReports = (int)($absoluteNumberOfVisitsToReports/$absoluteNumberOfSiteVisits*100);
                    }
                    if($absoluteNumberOfVisitsToIndex!=0){
                        $relativeNumberOfVisitsToIndex = (int)($absoluteNumberOfVisitsToIndex/$absoluteNumberOfSiteVisits*100);
                    }
                    if($absoluteNumberOfVisitsToAuthor!=0){
                        $relativeNumberOfVisitsToAuthor = (int)($absoluteNumberOfVisitsToAuthor/$absoluteNumberOfSiteVisits*100);
                    }
                    if($absoluteNumberOfVisitsToDashboard!=0){
                        $relativeNumberOfVisitsToDashboard = (int)($absoluteNumberOfVisitsToDashboard/$absoluteNumberOfSiteVisits*100);
                    }
                    if($absoluteNumberOfVisitsToSignIn!=0){
                        $relativeNumberOfVisitsToSignIn = (int)($absoluteNumberOfVisitsToSignIn/$absoluteNumberOfSiteVisits*100);
                    }
                    if($absoluteNumberOfVisitsToSignUp!=0){
                        $relativeNumberOfVisitsToSignUp = (int)($absoluteNumberOfVisitsToSignUp/$absoluteNumberOfSiteVisits*100);
                    }
                    if($absoluteNumberOfVisitsToFourHundredAndFour!=0){
                        $relativeNumberOfVisitsToFourHundredAndFour = (int)($absoluteNumberOfVisitsToFourHundredAndFour/$absoluteNumberOfSiteVisits*100);
                    }
                    if($absoluteNumberOfVisitsToCrudReports!=0){
                        $relativeNumberOfVisitsToCrudReports = (int)($absoluteNumberOfVisitsToCrudReports/$absoluteNumberOfSiteVisits*100);
                    }
                    if($absoluteNumberOfVisitsToCrudUsers!=0){
                        $relativeNumberOfVisitsToCrudUsers = (int)($absoluteNumberOfVisitsToCrudUsers/$absoluteNumberOfSiteVisits*100);
                    }
                    if($absoluteNumberOfVisitsToContribute!=0){
                        $relativeNumberOfVisitsToContribute = (int)($absoluteNumberOfVisitsToContribute/$absoluteNumberOfSiteVisits*100);
                    }
                    if($absoluteNumberOfVisitsToStatistics!=0){
                        $relativeNumberOfVisitsToStatistics = (int)($absoluteNumberOfVisitsToStatistics/$absoluteNumberOfSiteVisits*100);
                    }
                    $signingInLogs = file("data/signingInLog.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    foreach($signingInLogs as $log){
                        $partsOfLog = explode(";",$log);
                        $currentDay = date("Y-m-d");
                        if($partsOfLog[1]==$currentDay){
                            $numberOfUsersSignedInToday++;
                        }
                    }
                ?>
                <div class="d-flex flex-column pt-3 pb-3">
                    <label for="indexVisits"><h4>Visits to index: </h4></label>
                    <progress id="indexVisits" class="w-100 blackBackgroundColor" value="<?=$relativeNumberOfVisitsToIndex?>" max="100"></progress>
                    <span><h5>Relative: <?=$relativeNumberOfVisitsToIndex?>%</h5></span>
                    <span><h5>Absolute: <?=$absoluteNumberOfVisitsToIndex?></h5></span>
                </div>
                <div class="d-flex flex-column pt-3 pb-3">
                    <label for="reportsVisits"><h4>Visits to reports:</h4></label>
                    <progress id="reportsVisits" class="w-100 blackBackgroundColor" value="<?=$relativeNumberOfVisitsToReports?>" max="100"></progress>
                    <span><h5>Relative: <?=$relativeNumberOfVisitsToReports?>%</h5></span>
                    <span><h5>Absolute: <?=$absoluteNumberOfVisitsToReports?></h5></span>
                </div>
                <div class="d-flex flex-column pt-3 pb-3">
                    <label for="authorVisits"><h4>Visits to author:</h4></label>
                    <progress id="authorVisits" class="w-100 blackBackgroundColor" value="<?=$relativeNumberOfVisitsToAuthor?>" max="100"></progress>
                    <span><h5>Relative: <?=$relativeNumberOfVisitsToAuthor?>%</h5></span>
                    <span><h5>Absolute: <?=$absoluteNumberOfVisitsToAuthor?></h5></span>
                </div>
                <div class="d-flex flex-column pt-3 pb-3">
                    <label for="dashboardVisits"><h4>Visits to dashboard:</h4></label>
                    <progress id="dashboardVisits" class="w-100 blackBackgroundColor" value="<?=$relativeNumberOfVisitsToDashboard?>" max="100"></progress>
                    <span><h5>Relative: <?=$relativeNumberOfVisitsToDashboard?>%</h5></span>
                    <span><h5>Absolute: <?=$absoluteNumberOfVisitsToDashboard?></h5></span>
                </div>
                <div class="d-flex flex-column pt-3 pb-3">
                    <label for="signInVisits"><h4>Visits to sign in:</h4></label>
                    <progress id="signInVisits" class="w-100 blackBackgroundColor" value="<?=$relativeNumberOfVisitsToSignIn?>" max="100"></progress>
                    <span><h5>Relative: <?=$relativeNumberOfVisitsToSignIn?>%</h5></span>
                    <span><h5>Absolute: <?=$absoluteNumberOfVisitsToSignIn?></h5></span>
                </div>
                <div class="d-flex flex-column pt-3 pb-3">
                    <label for="signUpVisits"><h4>Visits to sign up:</h4></label>
                    <progress id="signUpVisits" class="w-100 blackBackgroundColor" value="<?=$relativeNumberOfVisitsToSignUp?>" max="100"></progress>
                    <span><h5>Relative: <?=$relativeNumberOfVisitsToSignUp?>%</h5></span>
                    <span><h5>Absolute: <?=$absoluteNumberOfVisitsToSignUp?></h5></span>
                </div>
                <div class="d-flex flex-column pt-3 pb-3">
                    <label for="404Visits"><h4>Visits to 404:</h4></label>
                    <progress id="404Visits" class="w-100 blackBackgroundColor" value="<?=$relativeNumberOfVisitsToFourHundredAndFour?>" max="100"></progress>
                    <span><h5>Relative: <?=$relativeNumberOfVisitsToFourHundredAndFour?>%</h5></span>
                    <span><h5>Absolute: <?=$absoluteNumberOfVisitsToFourHundredAndFour?></h5></span>
                </div>
                <div class="d-flex flex-column pt-3 pb-3">
                    <label for="crudReportsVisits"><h4>Visits to crud reports:</h4></label>
                    <progress id="crudReportsVisits" class="w-100 blackBackgroundColor" value="<?=$relativeNumberOfVisitsToCrudReports?>" max="100"></progress>
                    <span><h5>Relative: <?=$relativeNumberOfVisitsToCrudReports?>%</h5></span>
                    <span><h5>Absolute: <?=$absoluteNumberOfVisitsToCrudReports?></h5></span>
                </div>
                <div class="d-flex flex-column pt-3 pb-3">
                    <label for="crudUsersVisits"><h4>Visits to crud users:</h4></label>
                    <progress id="crudUsersVisits" class="w-100 blackBackgroundColor" value="<?=$relativeNumberOfVisitsToCrudUsers?>" max="100"></progress>
                    <span><h5>Relative: <?=$relativeNumberOfVisitsToCrudUsers?>%</h5></span>
                    <span><h5>Absolute: <?=$absoluteNumberOfVisitsToCrudUsers?></h5></span>
                </div>
                <div class="d-flex flex-column pt-3 pb-3">
                    <label for="contributeVisits"><h4>Visits to contribute:</h4></label>
                    <progress id="contributeVisits" class="w-100 blackBackgroundColor" value="<?=$relativeNumberOfVisitsToContribute?>" max="100"></progress>
                    <span><h5>Relative: <?=$relativeNumberOfVisitsToContribute?>%</h5></span>
                    <span><h5>Absolute: <?=$absoluteNumberOfVisitsToContribute?></h5></span>
                </div>
                <div class="d-flex flex-column pt-3 pb-3">
                    <label for="statisticsVisits"><h4>Visits to statistics:</h4></label>
                    <progress id="statisticsVisits" class="w-100 blackBackgroundColor" value="<?=$relativeNumberOfVisitsToStatistics?>" max="100"></progress>
                    <span><h5>Relative: <?=$relativeNumberOfVisitsToStatistics?>%</h5></span>
                    <span><h5>Absolute: <?=$absoluteNumberOfVisitsToStatistics?></h5></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pt-5 pb-5">
                <h3 class="text-center blackColor">Number of users signed in on the current day: </h3>
                <h4 class="text-center blackColor"><?=$numberOfUsersSignedInToday?></h4>
            </div>
        </div>
    </div>
</div>
<?php
    }
    else {
        header("Location: index.php?page=404");
    }
?>