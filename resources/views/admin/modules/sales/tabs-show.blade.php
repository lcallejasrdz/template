<li class="active">
    {!! link_to('#tab1', trans('module_'.$active.'.tabs.general'), ['data-toggle' => 'tab', 'aria-expanded' => 'true']) !!}
</li>
<li>
    {!! link_to('#tab2', trans('module_'.$active.'.tabs.shipping_address'), ['data-toggle' => 'tab']) !!}
</li>
<li>
    {!! link_to('#tab3', trans('module_'.$active.'.tabs.products'), ['data-toggle' => 'tab']) !!}
</li>