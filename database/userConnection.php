<?php

require 'connector.php';

class UserConnection extends Connection
{
    # add new user to Database
    public function addNewUser($chat_id, $group_id, $first_name)
    {
        $stmt = $this->db->prepare("INSERT INTO `tb_userStat` (`chat_id`, `group_id`, `first_name`) VALUES (?, ?, ?)");
        $stmt->execute([$chat_id, $group_id, $first_name]);
    }

    # get user info from Database
    public function getUser($chat_id, $group_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM `tb_userStat` WHERE `chat_id` = {$chat_id} AND `group_id` = {$group_id}");
        $stmt->execute();
        return $stmt->fetch();
    }

    # add 1 counter to message count for user
    public function addCountMessage($chat_id, $group_id)
    {
        $stmt = $this->db->prepare("UPDATE `tb_userStat` SET `counter` = `counter` + 1 WHERE `chat_id` = ? AND `group_id` = ?");
        $stmt->execute([$chat_id, $group_id]);
    }
}
