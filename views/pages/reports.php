<?php
    $page = "reports";
?>
<div class="container-fluid lightYellowBackgroundColor pt-5 pt-md-0">
    <div class="container pt-5 pt-md-0">
        <div class="row pt-3 pt-md-0">
            <div class="col-12 col-md-4">
                <form>
                    <h3 id="sizesLabel" class="blackColor">Sizes<span class="bi bi-chevron-down ml-1"></span></h3>
                    <ul id="sizes"></ul>
                    <h3 id="manufacturersLabel" class="blackColor">Manufacturers<span class="bi bi-chevron-down ml-1"></span></h3>
                    <ul id="manufacturers"></ul>
                    <h3 id="countriesLabel" class="blackColor">Countries<span class="bi bi-chevron-down ml-1"></span></h3>
                    <ul id="countries"></ul>
                    <h3 id="epochsLabel" class="blackColor">Epochs<span class="bi bi-chevron-down ml-1"></span></h3>
                    <ul id="epochs"></ul>
                </form>
            </div>
            <div class="col-12 col-md-8">
                <form class="d-lg-flex justify-content-between">
                    <div class="form-group">
                        <label class="blackColor" for="sortingCategories"><h3>Sorting by...</h3></label>
                        <select id="sortingCategories" class="form-control blackBackgroundColor lightYellowColor">
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="blackColor" for="searchByName"><h3>Search by name</h3></label>
                        <div class="d-flex">
                            <input type="search" class="form-control blackBackgroundColor lightYellowColor" id="searchByName"/><span class="bi bi-search ml-1 blackColor"></span>
                        </div>
                    </div>
                </form>
                <div id="reports" class="row justify-content-between ml-0 mr-0">
                </div>
                <div class="d-flex justify-content-between">
                    <ul class="pagination" id="pages">
                    </ul>
                    <button id="downloadAnExcelFile" class="lightYellowBackgroundColor blackColor" data-toggle="tooltip" data-placement="top" title="Click on this button to download our reports."><span class="bi bi-file-earmark-excel-fill"></span></button>
                    <a href="javascript:void(0)" id="downloadReports" style="display: none;">
                        <button type="button" id="excel"></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>