<aside aria-label="Sidebar" id='sidebar'>
    <div class="mt-8 font-bold text-center text-orange-300 uppercase tracking-wider">GHSS</div>
    <div class="text-xs text-center">Chak Bedi, Pakpattan</div>
    <div class="mt-12">
        <ul class="space-y-2">
            <li>
                <a href="{{url('admin')}}" class="flex items-center p-2">
                    <i class="bi-house"></i>
                    <span class="ml-3">Home</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.grades.index')}}" class="flex items-center p-2">
                    <i class="bi-activity"></i>
                    <span class="ml-3">Grades</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.classes.index')}}" class="flex items-center p-2">
                    <i class="bi-people"></i>
                    <span class="ml-3">Classes</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/teachers/import')}}" class="flex items-center p-2">
                    <i class="bi-person"></i>
                    <span class="ml-3">Teachers</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/teachers/excel')}}" class="flex items-center p-2">
                    <i class="bi-person"></i>
                    <span class="ml-3">Students</span>
                </a>
            </li>

            <li>
                <a href="{{url('students')}}" class="flex items-center p-2">
                    <i class="bi bi-search"></i>
                    <span class="ml-3">Search Student</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2">
                    <i class="bi bi-printer"></i>
                    <span class="ml-3">Print / Download</span>
                </a>
            </li>
        </ul>
    </div>
</aside>