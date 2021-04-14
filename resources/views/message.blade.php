<div class="flash-messages">
    @if(isset(session()->all()['_flash']))
        @foreach (session()->all()['_flash']['old'] as $flashKey)
            @if(is_string (session()->get($flashKey . '.content')))
            <p class="alert alert-{{ session()->get($flashKey . '.type', 'default') }} mt-3">
                {{ session()->get($flashKey.'.content') ?? session()->get($flashKey) }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </p>
            @endif
        @endforeach
    @endif
</div> <!-- end .flash-message -->