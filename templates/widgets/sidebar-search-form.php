<?php
/**
 * Advanced Search Form
 * User: Filip Uhlir
 * Date: 20.01.2017
 * Time: 15:30
 */
?>


<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12 col-xs-12 recent-header">
        <h5>Pokročilé vyhledávání</h5>
    </div>
    <div id="advanced-search" class="advanced-search">
        <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url(); ?>">
            <div class="form-element">
                <label for="search-input">Hledat</label>
                <input  id="search-input" class="" type="text" value="<?php the_search_query(); ?>" name="s"   />
            </div>
        <?php
            if(isset($_GET["author"])){
              $author = sanitize_text_field($_GET["author"]);
            }else{
              $author = "";
            }
            if(isset($_GET["tag"])){
              $tag = sanitize_text_field($_GET["tag"]);
            }else{
              $tag = "";
            }
            if(isset($_GET["category"])){
              $category = sanitize_text_field($_GET["category"]);
            }else{
              $category = "";
            }
            if(isset($_GET["categoryText"])){
              $categoryText = sanitize_text_field($_GET["categoryText"]);
            }else{
              $categoryText = "";
            }
            if(isset($_GET["dateFrom"])){
              $dateFromStr = sanitize_text_field($_GET["dateFrom"]);
            }else{
              $dateFromStr = "";
            }
            if(isset($_GET["dateTo"])){
              $dateToStr = sanitize_text_field($_GET["dateTo"]);
            }else{
              $dateToStr = "";
            }
        ?>

            <div class="col-md-12 col-xs-12 recent-header">
                <h5>Filtrovat výsledky podle kategorií</h5>
            </div>
            <div class="form-element">
                <label for="author">Autor textu</label>
                <input  id="author" class="" type="text" placeholder="Autor" value="<?php echo $author; ?>" name="author"   />
            </div>
            <input type="hidden" name="categoryText" value="<?php echo $categoryText; ?>">
            <input type="hidden" name="category" value="<?php echo $category; ?>">
            <div class="form-element">
                <label for="category">Rubrika</label>

                <select id="category-select" value="" class="category-select">
                    <option value="recenze">Recenze</option>
                    <option value="rozhovory">Rozhovory</option>
                    <option value="komentare">Komentáře</option>
                    <option value="foto-report">Foto report</option>
                    <option value="aktuality">Aktuality</option>
                    <option value="tiskove-zpravy">Tiskové zprávy</option>
                    <option value="doprovodne-programy">Doprovodné programy</option>
                    <option value="media-monitoring">Media monitoring</option>
                    <option value="blogy">Blogy</option>
                    <option value="artalk-revue">Artalk Revue</option>                    
                </select>
            </div>
            <div class="form-element datepicker-from">
               <label for="month">Datum od</label>
                <input  id="month" class="form-control" type="text" placeholder="Datum od" value="<?php echo $dateFromStr; ?>" name="dateFrom"   />
            </div>
            <div class="form-element datepicker-until">
                <label for="month">Datum do</label>
                <input  id="month" class="form-control" type="text" placeholder="Datum do" value="<?php echo $dateToStr; ?>" name="dateTo"   />
            </div>

            <div class="form-element">
                <label for="tag">Tagu</label>
                <input  id="tag" class="" type="text" placeholder="tag" value="<?php echo $tag; ?>" name="tag"   />
            </div>
                <input id="" class="" type="submit" value="Hledat">

        </form>
    </div>
</div>
