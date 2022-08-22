{if $pages}
    <div class="paginator">
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {include "./page_block.tpl" text="First" blockPage=1}

            {for $blockPage = $firstPage; $blockPage <= $lastPage; $blockPage++}
                {include "./page_block.tpl" text=($blockPage) blockPage=($blockPage)}
            {/for}
            {include "./page_block.tpl" text="Last" blockPage=$maxpage}

        </ul>
    </nav>
{/if}

