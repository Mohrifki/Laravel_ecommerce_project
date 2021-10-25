<div class="">
  <div class="select_body d-flex justify-content-between align-items-center">
    <select name="{{ $name }}" id="select{{ $name }}" class="form-control {{ $class }}" multiple>
        @foreach ($collection as $key=>$item)
            <option {{ $key==0? 'selected': '' }} value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    <button class="btn btn-info" data-toggle="modal" data-target="#{{$name}}Modal" type="button" title="add new brand"><i class="fa fa-plus"></i></button>
  </div>
  <span class="text-danger {{ $name }} "></span>
</div>

<div class="modal fade" id="{{ $name }}Modal" tabindex="-1" aria-labelledby="{{ $name }}ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-uppercase" id="{{ $name }}ModalLabel">{{ str_replace('_',' ',str_replace('_id','',$name)) }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <forms action="{{ $action }}" data-target_select="#select{{ $name }}" class="component_form" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
              @csrf
              <div class="preloader component_preloader"></div>
              @foreach ($fields as $item)   
                @php
                    $item = (object) $item;
                @endphp
                <div class="form-group">
                  <label for="">{{$item->name}}</label>
                  <div class="">
                    @if($item->type == 'text' || $item->type == 'file')
                      <input type="{{$item->type}}" name="{{$item->name}}" class="form-control" id="input-21" placeholder="{{$item->name}}" />
                    @endif

                    @if($item->type == 'textarea')
                      <textarea name="{{$item->name}}" class="form-control" cols="30" rows="5" placeholder="{{$item->name}}"></textarea>
                    @endif
                    <span class="text-danger {{$item->name}}"></span>
                  </div>
                </div>
              @endforeach
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="component_form_submit btn btn-primary">Submit</button>
          </div>
        </forms>
    </div>
  </div>
</div>