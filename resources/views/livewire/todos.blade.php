<?php

use function Livewire\Volt\{state, with};

state(['task']);

with([
    'todos' => fn() => App\Models\Todo::all(),
]);

$add = function () {
    auth()
        ->user()
        ->todos()
        ->create([
            'task' => $this->task,
        ]);
    // App\Models\Todo::create([
    //     'user_id' => auth()->id(),
    // ]);
    // $this->$task = '';
};

$delete = function(App\Models\Todo $todo){
    $todo->delete();
};

?>

<div>
    <form wire:submit='add'>
        <input type="text" wire:model='task'>
        <button type='submit'>Add</button>
    </form>
    <div>
        @foreach ($todos as $todo)
            <div>{{ $todo->task }}
                <button wire:click='delete({{$todo->id}})'>x</button>
            </div>
        @endforeach
    </div>

</div>
