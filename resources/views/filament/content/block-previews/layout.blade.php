<div>
    <h3>Two Column Layout</h3>
    <div style="display: flex; gap: 20px;">
        <div style="flex: 1;">
            <h4>Left Column</h4>
            @if (isset($left_column))
                <p>{{ is_array($left_column) ? count($left_column) : '1' }} block(s)</p>
            @else
                <p>No blocks.</p>
            @endif
        </div>
        <div style="flex: 1;">
            <h4>Right Column</h4>
            @if (isset($right_column))
                <p>{{ is_array($right_column) ? count($right_column) : '1' }} block(s)</p>
            @else
                <p>No blocks.</p>
            @endif
        </div>
    </div>
</div>
