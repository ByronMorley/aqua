import PubSub from 'pubsub-js';
import React from 'react';
import ReactDOM from 'react-dom';
import Aqua from '../modules/Aqua/Aqua.jsx';


export default class Core {

    constructor() {
        PubSub.publish('dom_ready');
    }
}

PubSub.subscribe('dom_ready', () => {
        if (document.querySelector('.aq-activity-main')) {
            let activityGroups = document.querySelectorAll('.aq-activity-main');
            for (let i = 0; i < activityGroups.length; i++) {
                new Aqua(activityGroups[i]);
            }
        }
    }
);

/******************************
 *      SUBSCRIPTIONS
 *******************************/

/**
 * Triggered on page loading, pre ajax
 * @item page object
 */
PubSub.subscribe('page_loading', (envelope, item) => {
});


/**
 * Triggered on page loaded, after ajax call
 * @item page object
 */
PubSub.subscribe('page_loaded', (envelope, item) => {
});


/**
 * Triggered when internal navigation link or button is pressed
 * @item absolute href of page
 */
PubSub.subscribe('internal_link', (envelope, item) => {
});



