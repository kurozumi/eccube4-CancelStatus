<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Plugin\CancelStatus\Service;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Symfony\Component\Workflow\Event\Event;

/**
 * @author Akira Kurozumi <info@a-zumi.net>
 */
class OrderStateMachine implements EventSubscriberInterface {

    public static function getSubscribedEvents(): array
    {
        return [
            'workflow.order.transition.cancel' => [['cancel']],
        ];
    }

    /**
     * 対応状況が注文取消しに変わったときの処理
     * 
     * @param Event $event
     */
    public function cancel(Event $event)
    {
        // 注文取消しになった受注データ
        $Order = $event->getSubject()->getOrder();
        
        // 注文取消しになった会員データ
        $Customer = $Order->getCustomer();
    }
}
