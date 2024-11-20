<x-main-page-layout title="Work experience admin panel">

    <a href="{{route('user.works.create')}}">create work</a>

    <ul class="list-disc pl-4">
        @foreach($works as $work)
            <li>
                Company: {{$work->company}}
                Title: {{$work->title}}
                <a href="{{route('user.works.edit', $work)}}">edit</a>
            </li>
        @endforeach
    </ul>

</x-main-page-layout>