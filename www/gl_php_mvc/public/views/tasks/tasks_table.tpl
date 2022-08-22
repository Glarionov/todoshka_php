<div class="tasks-title mt-5">
    <h2>Tasks list</h2>
</div>

{if ($elements)}
<table class="table task-table my-2">
    <thead>
        <tr>
            {foreach $columns as $columnName => $columnKey}
                <th scope="col">
                    {$columnName}
                    {if (in_array($columnKey, $sortableColumns))}
                        <span class="column-sorter" data-column="{$columnKey}" data-active="{$columnKey == $sortColumn}"
                              data-desc="{$desc}"
                        >
                                {if ($columnKey == $sortColumn)}
                                    {if ($desc)}
                                        <i class="fa fa-fw fa-sort-desc"></i>
                                    {else}
                                        <i class="fa fa-fw fa-sort-asc"></i>
                                    {/if}
                                {else}
                                    <i class="fa fa-fw fa-sort"></i>
                                {/if}
                            </span>
                    {/if}
                </th>
            {/foreach}
            {if ($isAdmin)}
                <th scope="col">
                    Actions
                </th>
            {/if}
        </tr>
    </thead>
    <tbody>

    {foreach $elements as $element}
        <tr data-id="{$element->id}" class="not-editing">
            <th scope="row">
                {$element->id}
            </th>
            <td>{$element->username}</td>
            <td>{$element->email}</td>
            <td>
                <div class="task-table__text">
                    <div class="task-table__text-static hide-on-edit">{$element->text}</div>
                </div>
            </td>
            <td>
                <input type="checkbox"
                   class="form-check-input task-table__status-changer"
                    {if ($element->done)}
                        checked
                    {/if}
                    {if empty($isAdmin)}
                        disabled
                    {/if}
                />
            </td>
            <td>
                <input type="checkbox"
                   class="form-check-input task-table__edited_by_admin"
                    {if ($element->edited_by_admin)}
                        checked
                    {/if}
                        disabled
                />
            </td>
            {if ($isAdmin)}
                <td>
                    <button class="btn btn-sm btn-success task-table__edit-button hide-on-edit ml-1 mt-1"">
                        Edit
                    </button>

                    <button class="btn btn-sm btn-success task-table__save-button hide-on-not-edit ml-1 mt-1">
                        Save
                    </button>

                    <button class="btn btn-sm btn-warning task-table__stop-edit-button hide-on-not-edit ml-1 mt-1"">
                        Stop
                    </button>

                    <div class="task-table__edit-message"></div>
                </td>
            {/if}
        </tr>
    {/foreach}
    </tbody>
</table>

    {else}
    No data available by this filter
{/if}
