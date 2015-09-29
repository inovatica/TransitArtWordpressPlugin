jQuery(document).ready(function($) {

    tinymce.create('tinymce.plugins.transitart_plugin', {
        init : function(ed, url) {

                ed.addButton('transitart_button', {title : 'Insert TransitArt', cmd : 'transitart_insert_shortcode', image: url + '/transitart_button.png' });

                ed.addCommand('transitart_insert_shortcode', function() {

                    ed.windowManager.open({
                        title: 'Insert TransitArt timetable',
                        width: 500,
                        height: 150,
                        body: [
                            {type: 'listbox',
                                name: 'type',
                                label: 'Type',
                                'values': [
                                    {text: 'Timetables', value: 'r'},
                                    {text: 'Journey planner with timetables', value: 't'},
                                ]
                            },
                            {type: 'listbox',
                                name: 'city',
                                label: 'City',
                                'values': [
                                    {text: 'Auckland', value: 'auckland'},
                                    {text: 'Budapest', value: 'budapeszt'},
                                    {text: 'Chicago', value: 'chicago'},
                                    {text: 'Lodz', value: 'lodz'},
                                    {text: 'San Francisco', value: 'sanfrancisco'},
                                    {text: 'Toronto', value: 'toronto'},
                                    {text: 'Vancouver', value: 'vancouver'},
                                    {text: 'Warsaw', value: 'warszawa'}
                                ]
                            }
                        ],
                        onsubmit: function(e) {
                            // Insert content when the window form is submitted
                            ed.insertContent('[transitart t="' + e.data.type + '" demo="' + e.data.city + '"]');
                        }
                    });

                    /*content =  '[shortcode]';
                    tinymce.execCommand('mceInsertContent', false, content);*/
                });

        },
    });

    tinymce.PluginManager.add('transitart_button', tinymce.plugins.transitart_plugin);
});