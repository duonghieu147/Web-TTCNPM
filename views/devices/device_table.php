<div style="overflow-x:auto;">
    <table>
        <thead>
            <tr>
                <th class="text-center" style="width:50px">STT</th>
                <th>Tên</th>
                <th>Nhà cung cấp</th>
                <th>Số lượng</th>
                <th class="text-right">Giá</th>
                <th class="text-right">Giảm giá</th>
                <th class="text-center">Sửa</th>
                <th class="text-center">Xóa</th>
            </tr>
        </thead>


        <tbody>
            <?php
            $i = 0;
            foreach ($list as $device) {
                $i++; ?>
                <tr>
                    <td class="text-center"><?php echo $i ?></td>
                    <td><?php echo $device->Name ?></td>
                    <td><?php echo $device->Supplier  ? $device->Supplier  : 'Chưa có' ?></td>
                    <td><?php echo number_format($device->Amount, 0, ".", ".") ?></td>
                    <td class="text-right"><?php echo number_format($device->Price, 0, ".", ".") ?></td>
                    <td class="text-right"><?php echo $device->Discount ? $device->Discount : 0 ?>%</td>
                    <td class="text-center">
                        <a onclick="openUpdateDialog(<?php echo $device->Id ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </a>
                    </td>
                    <td class="text-center">
                        <a onclick="deleteAPI(<?php echo $device->Id ?>)">
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
            <?php if (!count($list)) { ?>
                <tr>
                    <td class="text-center" colspan="100">Không có dữ liệu</td>
                </tr>
            <?php } ?>

        </tbody>

    </table>
</div>

<?php if ($total_pages > 1) { ?>



    <div class="Ppagination">
        <ul>

            <li class="prev">
                <i onclick="goToPage(<?php echo $page - 1 ?>)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </i>
            </li>


            <?php if ($page - 2 > 0) { ?>

                <li>
                    ...
                </li>
            <?php } ?>

            <!-- <li class="active">1</li> -->
            <?php
            $start = 1;
            $end = $total_pages;
            if ($total_pages > 3) {
                if ($page == 1) {
                    $start = 1;
                    $end = $page + 2;
                } else if ($page == $total_pages) {
                    $start = $page - 2;
                    $end = $total_pages;
                } else {
                    $start = $page - 1;
                    $end = $page + 1;
                }
            }
            ?>

            <?php for ($i = $start; $i <= $end; $i++) {

            ?>
                <li class="<?php echo $page == $i ? 'active' : '' ?>" onclick="getPage(<?php echo  $i ?>)">
                    <?php echo $i; ?>
                </li>

            <?php  }   ?>

            <?php if ($page + 2 <= $total_pages) { ?>

                <li>
                    ...
                </li>
            <?php } ?>

            <li class="next">
                <i onclick="goToPage(<?php echo $page + 1 ?>)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </i>
            </li>
        </ul>
    </div>

<?php  }   ?>