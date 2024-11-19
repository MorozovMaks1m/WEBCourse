<x-main-page-layout title="Morozov Maksim Personal Page"> 

    {{-- <section class="py-12 bg-blue-50"> --}}
        <div class="container mx-auto px-4">
            <h2 class="font-extrabold text-4xl text-center mb-12">Work Experience</h2>
                @foreach($works as $work)
                    <x-work-experience 
                        :employerName="$work->company" 
                        :workTitle="$work->title" 
                        :startDate="$work->start_date" 
                        :endDate="$work->end_date" 
                        :summary="$work->summary(100)"
                        :projects="$work->workProjects"
                    />
                    <br>
                @endforeach
        </div>
    {{-- </section> --}}
    

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
        <div>
            @foreach($education->thesis->skills as $skill)
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs">{{$skill->name}}</span>
            @endforeach
        </div>
        <p class="text-sm">Sumary: {{$education->summary(100)}}</p>

    </div>
    @endforeach

</x-main-page-layout>