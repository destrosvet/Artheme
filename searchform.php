<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url(); ?>">
    <button id="search-button" class="search-margin-top-xs search-margin-top-lg" type="submit"  />
    <img style="margin-bottom: 5px" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDMwLjIzOSAzMC4yMzkiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDMwLjIzOSAzMC4yMzk7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNMjAuMTk0LDMuNDZjLTQuNjEzLTQuNjEzLTEyLjEyMS00LjYxMy0xNi43MzQsMGMtNC42MTIsNC42MTQtNC42MTIsMTIuMTIxLDAsMTYuNzM1ICAgYzQuMTA4LDQuMTA3LDEwLjUwNiw0LjU0NywxNS4xMTYsMS4zNGMwLjA5NywwLjQ1OSwwLjMxOSwwLjg5NywwLjY3NiwxLjI1NGw2LjcxOCw2LjcxOGMwLjk3OSwwLjk3NywyLjU2MSwwLjk3NywzLjUzNSwwICAgYzAuOTc4LTAuOTc4LDAuOTc4LTIuNTYsMC0zLjUzNWwtNi43MTgtNi43MmMtMC4zNTUtMC4zNTQtMC43OTQtMC41NzctMS4yNTMtMC42NzRDMjQuNzQzLDEzLjk2NywyNC4zMDMsNy41NywyMC4xOTQsMy40NnogICAgTTE4LjA3MywxOC4wNzRjLTMuNDQ0LDMuNDQ0LTkuMDQ5LDMuNDQ0LTEyLjQ5MiwwYy0zLjQ0Mi0zLjQ0NC0zLjQ0Mi05LjA0OCwwLTEyLjQ5MmMzLjQ0My0zLjQ0Myw5LjA0OC0zLjQ0MywxMi40OTIsMCAgIEMyMS41MTcsOS4wMjYsMjEuNTE3LDE0LjYzLDE4LjA3MywxOC4wNzR6IiBmaWxsPSIjZTVlNWU1Ii8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
    </button>
    <input  id="search-text" class="search-margin-top-xs search-margin-top-lg" type="text" value="<?php the_search_query(); ?>" name="s"   />

</form>

<!--okamzite vyhledavani behem psani v textfieldu bez pouziti submit buttonu -->

<!--<form role="search" method="get" action="--><?php //echo home_url( '/' ); ?><!--">-->
<!--    <input type="search" class="form-control" placeholder="Search" value="--><?php //echo get_search_query() ?><!--" name="s" title="Search" />-->
<!--</form>-->