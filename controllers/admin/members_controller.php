<?php
require_once('controllers/base_controller.php');
require_once('models/member.php');

class MembersController extends BaseController 
{
    function __construct()
    {
        $this->folder = 'views/admin/members';
    }

    public function index()
    {
        $members = Member::getAllMember();
        $members = array("members" => $members);
        $this->render('index', $members);   
    }

    public function add()
    {
        $employee_name=$_POST['name'];
        $age=$_POST['age'];
        $position=$_POST['pos'];
        $phone=$_POST['phone'];
        $description=$_POST['description'];
        $department=$_POST['department'];
        $gender=$_POST['gender'];
        $branch=$_POST['branch'];
        Member::insert($employee_name, $age, $position,$phone,$description,$department,$gender,$branch);
        header('Location: index.php?page=admin&controller=members&action=index');
    }

    public function edit()
    {
        $employee_id = $_POST['id'];
        $employee_name = $_POST['name'];
        $age = $_POST['age'];
        $position = $_POST['pos'];
        $phone = $_POST['phone'];
        $description = $_POST['description'];
        $department = $_POST['department'];
        $gender = $_POST['gender'];
        $branch_id = $_POST['branch'];

        Member::edit($employee_id,$employee_name,$age,$position,$phone,$description,$department,$gender,$branch_id);
        header('Location: index.php?page=admin&controller=members&action=index');
    }

    public function delete()
    {
        $employee_id=$_POST['employee_id'];
        $delete_employee=Member::delete($employee_id);
        header('Location: index.php?page=admin&controller=members&action=index');
    }


}