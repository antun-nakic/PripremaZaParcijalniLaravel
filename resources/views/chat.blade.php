<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Chat') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div style="height:60vh;display:flex;flex-direction:column" class="p-6 bg-white border-b border-gray-200">
          <div id="poruke" style="flex-grow:1;margin:20px">
            <h2>Poruke:</h2>
            <ul>
              @foreach($poruke as $poruka)
              <li>{{$poruka->name}} - {{$poruka->poruka}} - {{$poruka->created_at}} -
                <form style="display: inline-block" action="{{ route('chat.destroy', $poruka->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button title="Delete">Delete</button>
                </form>
              </li>
              @endforeach
            </ul>
          </div>
          <form style="flex-grow:0;margin:20px;" method="POST" action={{route('chat.store')}}>
            @csrf
            <input type="text" name="poruka" />
            <input type="submit" value="Pošalji poruku" />
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>