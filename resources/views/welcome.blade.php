<x-main-page-layout title="Morozov Maksim Personal Page"> 

    <div class="container mx-auto px-4">
        <h2 class="font-extrabold text-4xl text-center mb-12">Recent Work Experience</h2>
        <x-work-experience 
            :employerName="$work->company" 
            :workTitle="$work->title" 
            :startDate="$work->start_date" 
            :endDate="$work->end_date" 
            :summary="$work->summary(100)"
            :projects="$work->workProjects"
        />
        <br>
    </div>

    <br><br>

    <div class="container mx-auto px-4">
        <h2 class="font-extrabold text-4xl text-center mb-12">Recent Education</h2>
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
    </div>

</x-main-page-layout>