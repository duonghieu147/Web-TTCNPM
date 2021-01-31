<table>

    <tr>
        <th class="text-center" style="width:50px">STT</th>
        <th>Họ và tên </th>
        <th>Giới tính</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Lần đăng nhập cuối</th>
        <th class="text-center">Xem</th>
        <th class="text-center">Xóa</th>
    </tr>
    <?php
    $i = 0;
    foreach ($list as $acc) {
        $i++; ?>
        <tr>
            <td class="text-center"><?php echo $i ?></td>
            <td><?php echo $acc->Name ?></td>
            <td><?php if ($acc->Sex == 'm') {
                    echo 'Nam';
                } else if ($acc->Sex == 'f') {
                    echo 'Nữ';
                } else {
                    echo 'Chưa có';
                } ?></td>
            <td><?php echo $acc->Email ?></td>
            <td><?php echo $acc->Phone ? $acc->Phone : 'Chưa có' ?></td>
            <td><?php echo $acc->LastOnline ?></td>
            <td class="text-center">
                <a onclick="openDialog('<?php echo $acc->Username ?>')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </a>
            </td>
            <td class="text-center">
                <a onclick="deleteAccount(<?php echo $acc->Id ?>)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                </a>
            </td>
        </tr>
    <?php } ?>

</table>