<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InputRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InputCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InputCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Input::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/input');
        CRUD::setEntityNameStrings('مستفيد', 'المستفيدين');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        CRUD::addColumn(['name' => 'first_name', 'type' => 'text', 'label' => 'الأسم الأول']);
        CRUD::addColumn(['name' => 'last_name', 'type' => 'text', 'label' => 'الأسم الثاني']);
        CRUD::addColumn(['name' => 'national_number', 'type' => 'text', 'label' => 'الرقم الوطني']);
        CRUD::addColumn(['name' => 'civil_state', 'type' => 'text', 'label' => 'الحالة المدنية']);
        CRUD::addColumn(['name' => 'gander', 'type' => 'text', 'label' => 'الجنس']);
        CRUD::addColumn(['name' => 'birth_year', 'type' => 'text', 'label' => 'تاريخ الميلاد']);
        CRUD::addColumn(['name' => 'prosthetics_number', 'type' => 'text', 'label' => 'عدد الاطراف']);
        CRUD::addColumn(['name' => 'center_name', 'type' => 'text', 'label' => 'اسم المركز']);
        CRUD::addColumn(['name' => 'level', 'type' => 'text', 'label' => 'المرحلة']);
        CRUD::addColumn(['name' => 'form_no', 'type' => 'text', 'label' => 'رقم الاستمارة']);
        CRUD::addColumn(['name' => 'available_doc', 'type' => 'text', 'label' => 'الوثائق المتاحة']);
        CRUD::addColumn(['name' => 'service', 'type' => 'text', 'label' => 'الخدمة']);
        CRUD::addColumn(['name' => 'type', 'type' => 'text', 'label' => 'الطرف']);
        CRUD::addColumn(['name' => 'cause', 'type' => 'text', 'label' => 'السبب']);
        CRUD::addColumn(['name' => 'date', 'type' => 'date', 'label' => 'تاريخ الخدمة']);
        CRUD::addColumn(['name' => 'pdf', 'type' => 'text', 'label' => 'ملف المريض']);
        CRUD::addColumn(['name' => 'pdf_repair', 'type' => 'text', 'label' => 'ملف الصيانة']);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(InputRequest::class);

        //CRUD::setFromDb(); // fields
        CRUD::addField(['name' => 'first_name', 'type' => 'text', 'label' => 'الأسم الأول']);
        CRUD::addField(['name' => 'last_name', 'type' => 'text', 'label' => 'الأسم الثاني']);
        CRUD::addField(['name' => 'national_number', 'type' => 'text', 'label' => 'الرقم الوطني']);
        CRUD::addField(['name' => 'civil_state',
            'type' => 'select_from_array',
            'options' => ['مقيم' => 'مقيم', 'نازح' => 'نازح'],
            'label' => 'الحالة المدنية']);
        CRUD::addField(['name' => 'gander',
            'type' => 'select_from_array',
            'options' => ['ذكر' => 'ذكر', 'انثى' => 'انثى'],
            'label' => 'الجنس']);
        CRUD::addField(['name' => 'birth_year', 'type' => 'number', 'label' => 'تاريخ الميلاد']);
        CRUD::addField(['name' => 'prosthetics_number', 'type' => 'text', 'label' => 'عدد الاطراف']);
        CRUD::addField(['name' => 'center_name',
            'type' => 'select_from_array',
            'options' => ['تعز' => 'تعز', 'سيؤون' => 'سيؤون', 'عدن' => 'عدن',
                'مأرب' => 'مأرب', 'الحديدة' => 'الحديدة', 'اخرى' => 'اخرى'],
            'label' => 'اسم المركز']);
        CRUD::addField(['name' => 'level',
            'type' => 'select_from_array',
            'options' => ['الأولى' => 'الأولى', 'الثانية' => 'الثانية', 'الثالثة' => 'الثالثة',
                'الرابعة' => 'الرابعة', 'الخامسة' => 'الخامسة', 'السادسة' => 'السادسة', 'السابعة' => 'السابعة',
                'الثامنة' => 'الثامنة'],
            'label' => 'المرحلة']);
        CRUD::addField(['name' => 'form_no', 'type' => 'text', 'label' => 'رقم الاستمارة']); //TODO:unique
        CRUD::addField(['name' => 'available_doc', 'type' => 'text', 'label' => 'الوثائق المتاحة']);
        CRUD::addField(['name' => 'service', 'type' => 'select_from_array',
            'options' => ['طرف' => 'طرف', 'صيانة' => 'صيانة'],
            'label' => 'الخدمة']);
        CRUD::addField(['name' => 'type', 'type' => 'select_from_array',
            'options' => ['فوق الركبة' => 'فوق الركبة', 'فوق المرفق' => 'فوق المرفق', 'عبر الركبة' => 'عبر الركبة',
                'عبر الورك' => 'عبر الورك', 'عبر المعصم' => 'عبر المعصم'
                , 'تحت الركبة' => 'تحت الركبة', 'تحت المرفق' => 'تحت المرفق', 'عبر المشط/الكاحل' => 'عبر المشط/الكاحل',
                'عبر الكتف' => 'عبر الكتف', 'عبر المرفق' => 'عبر المرفق', 'جزئي للقدم' => 'جزئي للقدم', 'جزئي لليد' => 'جزئي لليد',
                'طرف تقويمي(جهاز مساند)' => 'طرف تقويمي(جهاز مساند)'],
            'label' => 'نوع الطرف']);
        CRUD::addField(['name' => 'cause', 'type' => 'select_from_array',
            'options' => ['لغم' => 'لغم', 'حادث' => 'حادث', 'إصابة حرب' => 'إصابة حرب', 'تشوه خلقي' => 'تشوه خلقي',
                'مرضي/سكري' => 'مرضي/سكري', 'مرضي/ورم' => 'مرضي/ورم', 'اخرى' => 'اخرى'],
            'label' => 'السبب']);
        CRUD::addField(['name' => 'date', 'type' => 'date', 'label' => 'تاريخ الخدمة']);

        CRUD::addField(['name' => 'pdf', 'type' => 'upload',
            'upload' => true, 'label' => 'ملف المريض']);

        CRUD::addField(['name' => 'pdf_repair', 'type' => 'text', 'label' => 'ملف الصيانة']);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $user = backpack_user();
        if(!$user->is_admin){
            abort(403,"You have not access to this page");
        }
        $this->setupCreateOperation();
    }
    protected function setupDeleteOperation(){
        $user = backpack_user();
        if(!$user->is_admin){
            abort(403,"You have not access to this page");
        }
    }

    protected function setupShowOperation()
    {

        CRUD::addColumn(['name' => 'first_name', 'type' => 'text', 'label' => 'الأسم الأول']);
        CRUD::addColumn(['name' => 'last_name', 'type' => 'text', 'label' => 'الأسم الثاني']);
        CRUD::addColumn(['name' => 'national_number', 'type' => 'text', 'label' => 'الرقم الوطني']);
        CRUD::addColumn(['name' => 'civil_state', 'type' => 'text', 'label' => 'الحالة المدنية']);
        CRUD::addColumn(['name' => 'gander', 'type' => 'text', 'label' => 'الجنس']);
        CRUD::addColumn(['name' => 'birth_year', 'type' => 'text', 'label' => 'تاريخ الميلاد']);
        CRUD::addColumn(['name' => 'prosthetics_number', 'type' => 'text', 'label' => 'عدد الاطراف']);
        CRUD::addColumn(['name' => 'center_name', 'type' => 'text', 'label' => 'اسم المركز']);
        CRUD::addColumn(['name' => 'level', 'type' => 'text', 'label' => 'المرحلة']);
        CRUD::addColumn(['name' => 'form_no', 'type' => 'text', 'label' => 'رقم الاستمارة']);
        CRUD::addColumn(['name' => 'available_doc', 'type' => 'text', 'label' => 'الوثائق المتاحة']);
        CRUD::addColumn(['name' => 'service', 'type' => 'text', 'label' => 'الخدمة']);
        CRUD::addColumn(['name' => 'type', 'type' => 'text', 'label' => 'الطرف']);
        CRUD::addColumn(['name' => 'cause', 'type' => 'text', 'label' => 'السبب']);
        CRUD::addColumn(['name' => 'date', 'type' => 'date', 'label' => 'تاريخ الخدمة']);
        CRUD::addColumn(['name' => 'pdf', 'type' => 'text', 'label' => 'ملف المريض']);
        CRUD::addColumn(['name' => 'pdf_repair', 'type' => 'text', 'label' => 'ملف الصيانة']);
    }
}
