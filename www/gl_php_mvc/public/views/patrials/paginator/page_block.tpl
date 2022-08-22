<li class="page-item {if $blockPage == $page}active{/if}">
    <a class="page-link" data-page="{$blockPage}"
        href="{str_replace('#BLOCKPAGE#', $blockPage, $paginationUrlBase)}"
    >{$text}</a>
</li>