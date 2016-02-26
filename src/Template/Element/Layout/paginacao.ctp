<div class="row">
    <div class="col-xs-12 col-md-9 text-center">
        <?=
        $this->Paginator->numbers([
            'prev' => '< ' . __('previous'),
            'next' => __('next') . ' >',
            'escape' => false
        ])
        ?>
    </div>
    <div class="col-xs-12 col-md-3 text-right pagination">
        <p><?=
            $this->Paginator->counter([
                'format' => '{{page}} de {{pages}}'
            ])
            ?></p>
    </div>
</div>