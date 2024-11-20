<x-main-page-layout title="Edit">
    <form action="{{route('user.works.update', $work)}}" method="post">
        @method('PUT')
        @csrf

        <label for="company">Company</label><br/>
        <input name="company" value="{{old('company', $work->company)}}">

        <br/><br/>

        <label for="title">Title</label><br/>
        <input name="title" value="{{old('title', $work->title)}}">

        <br/><br/>

        <label for="description">Description</label><br/>
        <textarea name="description">{{old('description', $work->description)}}</textarea>

        <br/><br/>

        <div>
            <a href="{{route('user.works.index')}}">Undo</a>
            <button type="submit">Save changes</button>

        </div>
    </form>
</x-main-page-layout>
