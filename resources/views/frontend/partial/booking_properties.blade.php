<div class="book_form_tab">
    @if( !is_null($properties) )
    <label class="bft_question">Which type of property do you need to be cleaned?</label>
    <div class="book_service">
        <ul>
            @foreach( $properties as $property )
                <li>
                    <input type="radio" name="properties" id="property_{{ $property->id }}" value="{{ $property->id }}">
                    <label for="property_{{ $property->id }}"><i class="fa fa-check-circle"></i> <span>{{ ucfirst($property->name) }}</span></label>
                </li>
            @endforeach
        </ul>
    </div>
    @else
    <h2>No Property Found.</h2>
    @endif
</div>
