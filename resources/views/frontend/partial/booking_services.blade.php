@if( !is_null($services) )
<label>Which type of cleaning service do you need?</label>
<div class="book_service">
    <ul>
        @foreach( $services as $service )
            <li><a href="javascript:void(0);"><i class="fa fa-check-circle"></i> <span>{{ $service->name }}</span></a></li>
        @endforeach
    </ul>
</div>
@else
<h2>No Services Found.</h2>
@endif
