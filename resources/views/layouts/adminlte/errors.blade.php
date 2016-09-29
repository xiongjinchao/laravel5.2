@if (count($errors) > 0)
<div class="callout-box">
    <div class="callout callout-warning">
        <h4><i class="fa fa-times-circle"></i> 操作失败</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif