<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url(); ?>">
    <button id="search-button" class="search-margin-top-xs search-margin-top-lg" type="submit"  />
    <img style="margin-bottom: 5px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj48c3ZnIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9IjAgMCAyNCAyNCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxuczpzZXJpZj0iaHR0cDovL3d3dy5zZXJpZi5jb20vIiBzdHlsZT0iZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS1taXRlcmxpbWl0OjEuNDE0MjE7Ij4gICAgPHBhdGggZD0iTTE2LjAyOCwyLjc0NkMxMi4zNjYsLTAuOTE1IDYuNDA3LC0wLjkxNSAyLjc0NiwyLjc0NkMtMC45MTQsNi40MDggLTAuOTE0LDEyLjM2NiAyLjc0NiwxNi4wMjhDNi4wMDcsMTkuMjg4IDExLjA4NCwxOS42MzcgMTQuNzQzLDE3LjA5MkMxNC44MiwxNy40NTYgMTQuOTk3LDE3LjgwNCAxNS4yOCwxOC4wODdMMjAuNjEyLDIzLjQxOUMyMS4zODksMjQuMTk0IDIyLjY0NCwyNC4xOTQgMjMuNDE3LDIzLjQxOUMyNC4xOTQsMjIuNjQzIDI0LjE5NCwyMS4zODcgMjMuNDE3LDIwLjYxM0wxOC4wODYsMTUuMjhDMTcuODA0LDE0Ljk5OSAxNy40NTUsMTQuODIyIDE3LjA5MSwxNC43NDVDMTkuNjM4LDExLjA4NSAxOS4yODksNi4wMDggMTYuMDI4LDIuNzQ2Wk0xNC4zNDQsMTQuMzQ1QzExLjYxMSwxNy4wNzggNy4xNjIsMTcuMDc4IDQuNDMsMTQuMzQ1QzEuNjk4LDExLjYxMSAxLjY5OCw3LjE2NCA0LjQzLDQuNDNDNy4xNjIsMS42OTggMTEuNjExLDEuNjk4IDE0LjM0NCw0LjQzQzE3LjA3OCw3LjE2NCAxNy4wNzgsMTEuNjExIDE0LjM0NCwxNC4zNDVaIiBzdHlsZT0iZmlsbDpyZ2IoNDAsNDAsNDApO2ZpbGwtcnVsZTpub256ZXJvOyIvPjwvc3ZnPg==" />
    </button>
    <input  id="search-text" class="search-margin-top-xs search-margin-top-lg" type="text" value="<?php the_search_query(); ?>" name="s"   />

</form>

<!--okamzite vyhledavani behem psani v textfieldu bez pouziti submit buttonu -->

<!--<form role="search" method="get" action="--><?php //echo home_url( '/' ); ?><!--">-->
<!--    <input type="search" class="form-control" placeholder="Search" value="--><?php //echo get_search_query() ?><!--" name="s" title="Search" />-->
<!--</form>-->
