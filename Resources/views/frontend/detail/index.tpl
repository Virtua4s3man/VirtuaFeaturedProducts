{extends file="parent:frontend/detail/index.tpl"}

{block name='frontend_detail_description_properties'}
    {$smarty.block.parent}
    {if $vDisplayFeaturedProducts and $sArticle.is_featured == 0}
        <div class="content--title">{s name="is_featured" }{/s}</div>
    {/if}
{/block}