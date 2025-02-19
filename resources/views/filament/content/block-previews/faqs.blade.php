<div>
    <h3>FAQs</h3>
    @if(isset($items) && count($items))
        <ul>
            @foreach($items as $item)
                <li>
                    <strong>{{ $item['question'] ?? 'Question' }}</strong>
                    <p>{{ $item['answer'] ?? 'Answer' }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>No FAQs added.</p>
    @endif
</div>
