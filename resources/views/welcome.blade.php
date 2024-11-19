<x-main-page-layout title="Morozov Maksim Personal Page"> 

    <h2 class="font-bold text-3xl">Work experience</h2>

    @foreach($works as $work)
    <div class="mt-4">
        <x-title-with-interval 
            :mainTitle="$work->company" 
            :secondTitle="$work->title" 
            :dateStart="$work->start_date" 
            :dateEnd="$work->end_date" />

        <p class="text-sm">{{$work->summary(100)}}</p>
    </div>
    @endforeach

    <br><br>

    <h2 class="font-bold text-3xl">Education</h2>

    @foreach($educations as $education)
    <div class="mt-4">
        <x-title-with-interval 
            :mainTitle="$education->school_name" 
            :secondTitle="$education->stage" 
            :dateStart="$education->start_date" 
            :dateEnd="$education->end_date" />

        GPA = {{$education->gpa}}
        <br>
        Thesis: {{$education->thesis->title}}
        <p class="text-sm">{{$education->summary(100)}}</p>
    </div>
    @endforeach

</x-main-page-layout>