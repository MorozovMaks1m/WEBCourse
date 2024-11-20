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

    <div class="container mx-auto px-4">
        <h2 class="font-extrabold text-4xl text-center mb-12">Education</h2>
        @foreach($educations as $education)
        <x-education
            :schoolName="$education->school_name" 
            :description="$education->summary(100)" 
            :stage="$education->stage" 
            :thesis="$education->thesis" 
            :gpa="$education->gpa"
            :startDate="$education->start_date"
            :endDate="$education->end_date"
        />
        <br>
    @endforeach

</div>

</x-main-page-layout>