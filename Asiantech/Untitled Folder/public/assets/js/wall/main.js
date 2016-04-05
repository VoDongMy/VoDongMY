/*
 * Wall for  How Travel
 */

'use strict';

/*
 * namespace
 * ATCS = Asian Tech Cooperate Site
 */
var ATCS = window.ATCS = {};
var Widget = ATCS.Widget = {};
var Util = ATCS.Util = {};
var Page = ATCS.Page = {};
var Route = ATCS.Route = {
    all: '.',
    off: '^/off',
    about: '^/about',
    outline: '^/outline',
    team: '^/team',
    top: '^/index',
    contact: '^/contact',
    service: '^/service',
    service_detail: '^/service\//^[A-Z0-9]+$/',
};
// console.log(Route.top);
/*
 * on domContentLoaded
 */
$(function () {
    /*
     * all
     */
    Util.dispatcher(Route.all, function () {
        Page.all.init();
    });
    /*
     * top
     */
    Util.dispatcher(Route.top, function () {
        console.log("index");
        Page.top.init();
    });

    Util.dispatcher(Route.home, function () {

    });

    Util.dispatcher(Route.about, function () {
        console.log('about');
        Page.about.init();
    });

    Util.dispatcher(Route.contact, function () {
        Page.contact.init();
    });

    Util.dispatcher(Route.outline, function () {
        console.log('outline');
        Page.outline.init();
    });

    Util.dispatcher(Route.team, function () {
        console.log('team');
        Widget.dropdown.init();
    });

    Util.dispatcher(Route.service, function () {
        console.log('detail');
        Page.service.init();
    });

    Util.dispatcher(Route.service_detail, function () {
        console.log('service_detail');
    });
    // dispatch
    var url = Util.url.removeFirstPath();
    Util.dispatcher(url);
});

