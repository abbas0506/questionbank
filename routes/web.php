<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ClassController;
use App\Http\Controllers\admin\GradeController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\TeacherController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dep\ApplicationController;
use App\Http\Controllers\Dep\DepController;
use App\Http\Controllers\Dep\DocumentController;
use App\Http\Controllers\Dep\FeeController;
use App\Http\Controllers\Dep\GroupController as DepGroupController;
use App\Http\Controllers\Dep\ObjectionController;
use App\Http\Controllers\Dep\PdfController as DepPdfController;
use App\Http\Controllers\Dep\PrintController as DepPrintCotroller;
use App\Http\Controllers\Dep\RaiseObjectionController;
use App\Http\Controllers\Dep\RecommendationController;
use App\Http\Controllers\Dep\TodayActivityController;
use App\Http\Controllers\Dep\UnderProcessController;
use App\Http\Controllers\library\assistant\BookController;
use App\Http\Controllers\library\assistant\BookRackController;
use App\Http\Controllers\library\assistant\ClassController as AssistantClassController;
use App\Http\Controllers\library\assistant\LibrayAssistantController;
use App\Http\Controllers\library\assistant\QRCodeController;
use App\Http\Controllers\library\incharge\LibrayInchargeController;

use FontLib\Table\Type\cmap;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {

        if (Auth::user()->hasRole('admin'))
            return redirect('admin');
        elseif (Auth::user()->hasRole('dep'))
            return redirect('dep');
    } else {
        return view('index');
    }
});

Route::get('login/as', function () {
    $year = date('Y');
    return view('login_as', compact('year'));
});

Route::post('login', [AuthController::class, 'login']);
Route::post('login/as', [AuthController::class, 'loginAs'])->name('login.as');
Route::get('signout', [AuthController::class, 'signout'])->name('signout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('grades', GradeController::class)->only('index');
    Route::resource('classes', ClassController::class);
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);

    Route::get('more/teachers/import', [TeacherController::class, 'import'])->name('teachers.import');
    Route::post('more/teachers/import', [TeacherController::class, 'postImport'])->name('teachers.import.post');

    Route::get('students/import/{clas}', [StudentController::class, 'import']);
    Route::post('students/import', [StudentController::class, 'postImport']);

    Route::view('change/password', 'admin.change_password');
    Route::post('change/password', [AuthController::class, 'changePassword'])->name('change.password');

    Route::resource('groups', GroupController::class);
});

Route::group(['prefix' => 'dep', 'as' => 'dep.', 'middleware' => ['role:dep']], function () {
    Route::get('/', [DepController::class, 'index']);
    Route::view('change/password', 'dep.change_password');
    Route::post('change/password', [AuthController::class, 'changePassword'])->name('change.password');
    Route::resource('applications', ApplicationController::class);
    Route::get('change/group/{app}', [ApplicationController::class, 'viewChangeGroup']);
    Route::patch('change/group/{app}', [ApplicationController::class, 'postChangeGroup']);

    Route::resource('objections', ObjectionController::class);
    Route::resource('documents', DocumentController::class);
    Route::resource('fee', FeeController::class);
    Route::resource('underprocess', UnderProcessController::class);
    Route::resource('groups', DepGroupController::class)->only('show');
    Route::get('groups/{group}/print', [DepGroupController::class, 'print'])->name('groups.print');
    Route::get('today/activity', [TodayActivityController::class, 'index']);
    Route::get('print', [DepPrintCotroller::class, 'index']);
    Route::get('pdf/recommended', [DepPdfController::class, 'recommended']);
    Route::get('pdf/objectioned', [DepPdfController::class, 'objectioned']);
    Route::get('pdf/underprocess', [DepPdfController::class, 'underprocess']);
    Route::get('pdf/feepaid', [DepPdfController::class, 'feepaid']);
    Route::get('pdf/finalized', [DepPdfController::class, 'finalized']);
});

Route::group(['prefix' => 'library/incharge', 'as' => 'library.incharge.', 'middleware' => ['role:library_incharge']], function () {
    Route::get('/', [LibrayInchargeController::class, 'index']);
});

Route::group(['prefix' => 'library/assistant', 'as' => 'library.assistant.', 'middleware' => ['role:library_assistant']], function () {
    Route::get('/', [LibrayAssistantController::class, 'index']);
    Route::resource('books', BookController::class)->except('delete');
    Route::resource('book_racks', BookRackController::class)->only('show');
    Route::resource('classes', AssistantClassController::class)->only('show');

    Route::get('qrcodes', [QRCodeController::class, 'index'])->name('qrcodes.index');

    Route::get('qrcodes/books/preview/{rack}', [QRCodeController::class, 'previewBooksQR'])->name('qrcodes.books.preview');
    Route::get('qrcodes/teachers/preview', [QRCodeController::class, 'previewTeachersQR'])->name('qrcodes.teachers.preview');
    Route::get('qrcodes/students/preview/{clas}', [QRCodeController::class, 'previewStudentsQR'])->name('qrcodes.students.preview');
});
