<?php while ($row = mysqli_fetch_assoc($sql)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row[
        'unique_id'
    ]}) AND (outgoing_msg_id = {$outgoing_id} OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    if (mysqli_num_rows($query2) > 0) {
        $result = $row2['msg'];
    }else {
        $result = 'No message available';
    }
    (strlen($result) > 28 ? $msg = substr($result, 0, 28).'...' : $msg = $result);

    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";

    ($row['status'] == "Offline now") ? $offline = " offline" : $offline = "";
        $output .= '<a  href="chat_area.php?user_id='.$row['unique_id'].'" class="friend_info">
        <div class="friend_info_detail">
            <figure>
                <img src="php/images/'.$row['img'].'" alt="">
            </figure>
            <div class="friend_info_content">
                <div class="friend_info_name">
                    <p>'.$row['fname']." ".$row['lname'].'</p>
                </div>
                <div class="friend_info_message">
                    <span>'.$you.$msg.'</span>
                </div>
            </div>
        </div>
        <div class="status">
            <i class="fa-solid fa-circle '.$offline.'"></i>
        </div>
    </a>';
    }
?>