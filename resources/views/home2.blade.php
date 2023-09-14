<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url(asset("asset/css/all.min.css"))}}">
    <link rel="stylesheet" href="{{url(asset("asset/css/normalized.css"))}}">
    <link rel="stylesheet" href="{{url(asset("asset/css/style.css"))}}">
    <link rel="stylesheet" href="{{url(asset("asset/css/bootstrap.min.css"))}}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    {{--    <link href="{{ asset('node_modules/tailwindcss/dist/tailwind.min.css') }}" rel="stylesheet">--}}


    <!-- Styles -->

    <style>
        /* تجاوز لون Bootstrap عند تمرير المؤشر على الروابط */
        #logoutMenu a:hover {
            color: red;
            background: white;
        }
    </style>
    <title>دليل مشفى الاوروبي </title>
</head>
<body class="bg-gray-100">
<div class="navbar">
    <nav class="p-4 shadow-md w-full">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('home2') }}" class="text-white">
                    <img src="{{ url(asset('asset/imgs/logo.jpg')) }}" alt="شعار" width="100" height="100">
                </a>

                <a href="{{ route('home2') }}" class="text-white">
                    <i class="fas fa-home"></i> الصفحة الرئيسية
                </a>
                @can('person-create')
                <a href="{{ route('person.create') }}" class="text-white">
                    <i class="fas fa-user-plus"></i> إضافة موظف
                </a>
                @endcan
                <a href="{{ route('dept.index') }}" class="text-white">
                    <i class="fas fa-building"></i> الأقسام
                </a>

                <a href="{{ route('city.index') }}" class="text-white">
                    <i class="fas fa-city"></i> المدن
                </a>

                <a href="{{ route('users.index') }}" class="text-white">
                    <i class="fas fa-users"></i> إدارة المستخدمين
                </a>

                <a href="{{ route('roles.index') }}" class="text-white">
                    <i class="fas fa-user-cog"></i> إدارة الصلاحيات
                </a>


                <button id="scrollToTop">العودة للأعلى</button>
            </div>

            <div class="relative">
                @auth
                    <a href="#" class="text-white hover:text-yellow-300 flex items-center" id="userName">
                        <i class="fas fa-user text-base mr-1"></i>
                        <span class="text-sm">{{ Auth::user()->name }}</span>
                    </a>

                    <ul class="p-2 space-y-1 mt-2 absolute top-12 right-0 hidden" id="logoutMenu">
                        <li class="flex items-center" style="width: 200px;height: 30px">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="flex items-center">
                                تسجيل الخروج <i style="margin: 15px" class="fas fa-sign-out-alt"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>

        <div id="currentTime" class="text-center text-gray-500 mt-4">
            <i class="fas fa-clock text-indigo-600 text-lg"></i>
            <span id="timeSpan" class="text-indigo-600 text-lg font-semibold ml-2">00:00:00</span>
        </div>


    </nav>
</div>
<br>


<main class="p-4">
    <div class="flex">
        <section class="w-1/6 flex justify-end pr-3 serach">
            <div class="flex items-center justify-center h-full">
                <form class="bg-white p-4 rounded-lg shadow-md text-center" action="{{route('person.search')}}"
                      method="get">
                    @csrf
                    <h2 class="text-lg font-semibold mb-2">البحث</h2>

                    <label for="name" class="block text-sm mb-1">
                        <i class="fas fa-user text-lg"></i> الاسم
                    </label>
                    <input type="text" id="name" name="name" class="w-full border-gray-300 rounded-md px-3 py-2 mb-2"
                           placeholder="الاسم">

                    <label for="mobile" class="block text-sm mb-1">
                        <i class="fas fa-mobile-alt text-lg"></i> الجوال
                    </label>
                    <input type="text" id="mobile" name="mobile"
                           class="w-full border-gray-300 rounded-md px-3 py-2 mb-2" placeholder="الجوال">

                    <label for="phone" class="block text-sm mb-1">
                        <i class="fas fa-phone text-lg"></i> التلفون
                    </label>
                    <input type="text" id="phone" name="phone" class="w-full border-gray-300 rounded-md px-3 py-2 mb-2"
                           placeholder="التلفون">

                    <!-- مثال على استخدام أيقونة في القسم -->
                    <label for="department" class="block text-sm mb-1">
                        <i class="fas fa-building text-lg"></i> القسم
                    </label>
                    <select name="dept_id" class="form-control">
                        <option value="">اختر القسم</option>
                        @foreach ($depts as $dep)
                            <option value="{{ $dep->id }}">{{ $dep->Dept_Name }}</option>
                        @endforeach
                    </select><br><br>

                    <!-- مثال على استخدام أيقونة في القسم -->
                    <label for="city" class="block text-sm mb-1">
                        <i class="fas fa-map-marker-alt text-lg"></i> المدينة
                    </label>
                    <select name="city_id" class="form-control">
                        <option value="">اختر المدينة</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->cityName }}</option>
                        @endforeach
                    </select><br><br>

                    <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300">
                        <i class="fas fa-search"></i> بحث
                    </button>
                </form>
            </div>
        </section>


        <section class="w-5/6 ml-4">


            <!-- عرض الجداول -->
            <table class="table border">
                <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="p-3 whitespace-nowrap"><i class="fas fa-hashtag"></i> الرقم</th>
                    <th class="p-3 whitespace-nowrap"><i class="fas fa-user"></i> الاسم الشخصي</th>
                    <th class="p-3 whitespace-nowrap"><i class="fas fa-briefcase"></i> الوظيفة</th>
                    <th class="p-3 whitespace-nowrap"><i class="fas fa-layer-group"></i> القسم</th>
                    <th class="p-3 whitespace-nowrap"><i class="fas fa-city"></i> المدينة</th>
                    <th class="p-3 whitespace-nowrap"><i class="fas fa-mobile-alt"></i> جوال</th>
                    <th class="p-3 whitespace-nowrap"><i class="fas fa-phone"></i> تلفون</th>
                    @can('person-delete')
                        <th class="p-2 whitespace-nowrap"><i class="fas fa-cogs"></i> الاجراءات</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($persons as $person)
                    <tr class="table-row">
                        <td class="p-2 whitespace-nowrap"><i class="fas fa-hashtag"></i> <span>{{ $person->id }}</span>
                        </td>
                        <td class="p-2 whitespace-nowrap"><i class="fas fa-user"></i><span> {{ $person->P_Name }}</span>
                        </td>
                        <td class="p-2 whitespace-nowrap"><i
                                class="fas fa-briefcase"></i><span> {{ $person->Position }}</span></td>
                        <td class="p-2 whitespace-nowrap"><i
                                class="fas fa-layer-group"></i> <span>{{ $person->depts->Dept_Name }}</span></td>
                        <td class="p-2 whitespace-nowrap"><i class="fas fa-city"></i>
                            <span>{{ $person->cities->cityName }}</span>
                        </td>
                        <td class="p-2 whitespace-nowrap"><i class="fas fa-mobile-alt"></i>
                            <span>{{ $person->Jawwal1 }}</span></td>
                        <td class="p-2 whitespace-nowrap"><i class="fas fa-phone"></i>
                            <span>{{ $person->Phone1 }}</span></td>

                        <td class="p-2 whitespace-nowrap">
                            <form onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذا الموظف؟')"
                                  action="{{ route('person.destroy', $person->id) }}" method="POST"
                                  class="flex items-center space-x-2">
                                @method('DELETE')
                                @csrf
                                @can('role-create')
                                    <a class="btn btn-primary" href="{{ route('person.edit', $person->id) }}">
                                        <i class="fas fa-edit"></i> <!-- أيقونة التعديل -->
                                        تعديل
                                    </a>
                                @endcan
                                @can('person-edit')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> <!-- أيقونة الحذف -->
                                        حذف
                                    </button>
                                @endcan
                            </form>
                        </td>

                @endforeach
                </tbody>
            </table>
        </section>

    </div>
</main>
<script>
    const searchSection = document.getElementById('searchSection');
    const tableSection = document.querySelector('.table');

    // تنشيط وإلغاء تنشيط تأثير البحث
    function toggleSearchEffect() {
        searchSection.classList.toggle('active');
    }

    // تنشيط تأثير الجدول عند تحميل الصفحة
    window.addEventListener('load', () => {
        tableSection.classList.add('active');
    });
</script>


<script>
    const notificationBar = document.getElementById('notificationBar');
    const timeSpan = document.getElementById('timeSpan');

    // تأخير عرض الشريط الإشعاري بـ 5 ثوانٍ بعد تحميل الصفحة
    // window.addEventListener('load', () => {
    //     setTimeout(() => {
    //         notificationBar.classList.remove('hidden');
    //     }, 1000); // تأخير 5 ثوانٍ

        // عرض الوقت الحالي بشكل ديناميكي
    // });
        updateTime();


    // تحديث الوقت كل ثانية
    function updateTime() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        timeSpan.textContent = `${hours}:${minutes}:${seconds}`;

        setTimeout(updateTime, 1000); // تحديث الوقت كل ثانية
    }
</script>


<script>
    const userName = document.getElementById('userName');
    const logoutMenu = document.getElementById('logoutMenu');

    userName.addEventListener('click', function (event) {
        event.stopPropagation(); // منع انتشار الحدث إلى النافذة
        logoutMenu.classList.toggle('hidden');
    });

    // إغلاق القائمة عند النقر خارجها
    window.addEventListener('click', function (event) {
        if (!userName.contains(event.target) && !logoutMenu.contains(event.target)) {
            logoutMenu.classList.add('hidden');
        }
    });
</script>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

<script>
    // عرض أو إخفاء زر العودة للأعلى بناءً على موضع التمرير
    window.addEventListener('scroll', function () {
        const scrollToTopButton = document.getElementById('scrollToTop');
        if (window.scrollY > 100) {
            scrollToTopButton.style.display = 'block';
        } else {
            scrollToTopButton.style.display = 'none';
        }
    });

    // التمرير إلى أعلى الصفحة عند النقر على زر العودة للأعلى
    document.getElementById('scrollToTop').addEventListener('click', function () {
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
</script>


</body>
</html>
