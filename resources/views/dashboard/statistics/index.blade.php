<x-app-layout>
    <div class="container">
        <h1 class="my-4">Statistics</h1>

        <!-- Course Student Counts -->
        <div class="card mb-4">
            <div class="card-header">Course Student Counts</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Number of Students</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courseStudentCounts as $course)
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->students_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Student Course Counts -->
        <div class="card mb-4">
            <div class="card-header">Student Course Counts</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Number of Courses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentCourseCounts as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->student_courses_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Teacher Lessons Counts -->
        <div class="card mb-4">
            <div class="card-header">Teacher Lessons Counts</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Teacher</th>
                            <th>Number of Lessons</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teacherLessonsCounts as $teacher)
                            <tr>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->lessons_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
