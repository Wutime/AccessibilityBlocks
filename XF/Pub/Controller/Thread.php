<?php

namespace Wutime\AccessibilityBlocks\XF\Pub\Controller;

class Thread extends XFCP_Thread
{
    protected function inject(\XF\Mvc\Reply\AbstractReply $reply): void
    {
        if ($reply instanceof \XF\Mvc\Reply\View)
        {
            $thread = $reply->getParam('thread');
            if ($thread && $thread->thread_id)
            {
                // Expose as page-container params so your include can read them anywhere
                $reply->setPageParam('wacc_first_post_id', (int)$thread->first_post_id);
                $reply->setPageParam('wacc_last_post_id',  (int)$thread->last_post_id);
                $reply->setPageParam('wacc_thread_title',  (string)$thread->title);
            }
        }
    }

    public function actionIndex(\XF\Mvc\ParameterBag $params)
    {
        $reply = parent::actionIndex($params);
        $this->inject($reply);
        return $reply;
    }

    public function actionPage(\XF\Mvc\ParameterBag $params)
    {
        $reply = parent::actionPage($params);
        $this->inject($reply);
        return $reply;
    }

    public function actionLatest(\XF\Mvc\ParameterBag $params)
    {
        $reply = parent::actionLatest($params);
        $this->inject($reply);
        return $reply;
    }

    public function actionUnread(\XF\Mvc\ParameterBag $params)
    {
        $reply = parent::actionUnread($params);
        $this->inject($reply);
        return $reply;
    }
}
