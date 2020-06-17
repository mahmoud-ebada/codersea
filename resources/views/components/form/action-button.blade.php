@form(['action' => $action, 'method' => 'post', 'onsubmit' => isset($onsubmit) ? $onsubmit : ''])
    {{ method_field($method) }}
    @button(['title' => $title, 'type' => $type])
    @endbutton
@endform