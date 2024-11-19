<x-main-page-layout title="Morozov Maksim Personal Page"> 

    <h2 class="font-bold text-3xl">Work experience</h2>

    @foreach($works as $work)
    <div class="mt-4">
        <x-title-with-interval 
            :mainTitle="$work->company" 
            :secondTitle="$work->title" 
            :dateStart="$work->start_date" 
            :dateEnd="$work->end_date" />
        <p class="text-sm">Summary: {{$work->summary(100)}}</p>

        <h2 class="font-bold text-xl">Projects</h2>
        @foreach($work->workProjects as $project)
            <div>
                {{$project->title}}
            </div>
            <div>
                @foreach($project->skills as $skill)
                    <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$skill->name}}</span>
                @endforeach
            </div>
        @endforeach
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
        <p class="text-sm">Sumary: {{$education->summary(100)}}</p>
        <div>
            @foreach($education->thesis->skills as $skill)
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$skill->name}}</span>
            @endforeach
        </div>
    </div>
    @endforeach

</x-main-page-layout>