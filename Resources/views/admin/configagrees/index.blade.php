@php

    $configuration = icommerceagree_get_configuration();
    $options = array('required' =>'required','step' => '0.01','min' => 0);

    if($configuration==NULL)
        $cStatus = 0;
    else
        $cStatus = $configuration->status;

    $formID = uniqid("form_id");

@endphp

@if($configuration==NULL)
{!! Form::open(['route' => ["admin.icommerceagree.configagree.store"], 'method' => 'post','name' => $formID]) !!}
@else
{!! Form::open(['route' => ['admin.icommerceagree.configagree.update'], 'method' => 'put','name' => $formID]) !!}
@endif

<div class="col-xs-12">

    <div class="form-group">
        <div>
            <label class="checkbox-inline">
                <input name="status" type="checkbox"  @if($cStatus==1) checked @endif >{{trans('icommerceagree::configagrees.table.activate')}}
            </label>
        </div>   
    </div>
   
    <div class="box-footer">
    <button type="submit" class="btn btn-primary btn-flat">{{ trans('icommerceagree::configagrees.button.save configuration') }}</button>
    </div>

</div>

{!! Form::close() !!}