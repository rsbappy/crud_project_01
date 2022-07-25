<?php
define('DB_NAME', 'C:\xampp\htdocs\learnphp/crud/db.text');
//define('DB_NAME', 'J:\Website\htdocs\learnphp\crud\db.text');

function seed()
{
    $data = array(
        array(
            'id' => 1,
            'fname' => 'Kamal',
            'lname' => 'Ahmed',
            'roll' => '11',

        ),
        array(
            'id' => 2,
            'fname' => 'Jamal',
            'lname' => 'Ahmed',
            'roll' => '12',

        ),
        array(
            'id' => 3,
            'fname' => 'Hasem',
            'lname' => 'Ahmed',
            'roll' => '13',

        ),
        array(
            'id' => 4,
            'fname' => 'Roni',
            'lname' => 'Ahmed',
            'roll' => '14',

        ),  array(
            'id' => 5,
            'fname' => 'Azad',
            'lname' => 'Ahmed',
            'roll' => '15',

        ),
    );
    $serializeData = serialize($data);
    file_put_contents(DB_NAME, $serializeData, LOCK_EX);
}
function generateReport()
{
    $serializeData =  file_get_contents(DB_NAME);
    $students = unserialize($serializeData);
?>
<table>
    <tr>
        <th>Name</th>
        <th>Roll</th>
        <?php if (hasPrivilege()): ?>
        <th width=25%>Action</th>
    <?php endif; ?>
    </tr>
    <?php foreach ($students as $student) {
        ?>
    <tr>
        <td> <?php printf("%s %s", $student['fname'], $student['lname']); ?></td>
        <td><?php printf("%s", $student['roll']); ?> </td>
        <?php if (isAdmin()): ?>
        <td><?php printf("<a href='/learnphp/crud/index.php?task=edit&id=%s'>Edit</a> | <a class='delete' href='/learnphp/crud/index.php?task=delete&id=%s''>Delete</a>", $student['id'], $student['id']); ?>
            <?php elseif (isEditor()):?>
        <td><?php printf("<a href='/learnphp/crud/index.php?task=edit&id=%s'>Edit</a> ", $student['id']); ?>

            <?php endif; ?>
        </td>

    </tr>
    <?php
        } ?>
</table>
<?php
}

function addStudent($fname, $lname, $roll)
{
    $found = false;
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);
    foreach ($students as $_student) {
        if ($_student['roll'] == $roll) {
            $found = true;
            break;
        }
    }

    if (!$found) {

        $newId = getNewId($students);
        $student = array(
            'id' => $newId,
            'fname' => $fname,
            'lname' => $lname,
            'roll' =>  $roll,
        );
        array_push($students, $student);
        $serializeData = serialize($students);
        file_put_contents(DB_NAME, $serializeData, LOCK_EX);
        return true;
    }
    return false;
}


function getStudent($id)
{
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);
    foreach ($students as $student) {
        if ($student['id'] == $id) {
            return $student;
        }
    }
    return false;
}


function updateStudent($id, $fname, $lname, $roll)
{
    $found = false;
    $serializeData = file_get_contents(DB_NAME);
    $students    = unserialize($serializeData);
    foreach ($students as $_student) {
        if ($_student['roll'] == $roll && $_student['id'] != $id) {
            $found = true;
            break;
        }
    }
    if (!$found) {


        $students[$id - 1]['fname'] = $fname;
        $students[$id - 1]['lname'] = $lname;
        $students[$id - 1]['roll'] = $roll;
        $serializeData = serialize($students);
        file_put_contents(DB_NAME, $serializeData, LOCK_EX);
        return true;
    }
    return false;
}

function deleteStudent($id)
{
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);
    foreach ($students as $haju => $student) {
        if ($student['id'] == $id) {
            unset($students[$haju]);
        }
    }
    $serializeData = serialize($students);
    file_put_contents(DB_NAME, $serializeData, LOCK_EX);
}



function getNewId($students)
{
    $maxId = max(array_column($students, 'id'));
    return $maxId + 1;
}
function isAdmin(){
    return (@$_SESSION['role']   == 'admin');


}
function isEditor(){
    return (@$_SESSION['role'] =='editor');
}
function hasPrivilege(){
    return  (isAdmin() || isEditor());
}