/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

pimcore.registerNS("pimcore.asset.metadata.grid");
/**
 * @private
 */
pimcore.asset.metadata.grid = Class.create({

    initialize: function (config) {
        this.config = config;
        this.asset = config.asset;

        /** @type {pimcore.asset.metadata.dataProvider} */
        this.dataProvider = config.dataProvider;
    },

    getLayout: function () {
        if (this.grid == null) {
            if (this.dataProvider.getItemCount() < 1) {
                // default fields
                if (this.asset.data.type == "image") {
                    this.dataProvider.update({
                        name: "title",
                        type: "input",
                        language: "",
                        data: ""
                    });
                    this.dataProvider.update({
                        name: "alt",
                        type: "input",
                        language: "",
                        data: ""
                    });
                    this.dataProvider.update({
                        name: "copyright",
                        type: "input",
                        language: "",
                        data: ""
                    });
                }
            }
            if (this.asset.isAllowed('publish')){
                this.editorLayout();
            }else{
                this.viewerLayout();
            }
        }
        return this.grid;
    },
    viewerLayout: function () {

        this.dataProvider.setStore(this.asset.data.metadata);

        const storeData = this.dataProvider.getDataAsArray();

        const store = new Ext.data.Store({
            data: storeData
        });

        const nameConfig = {
            text: t("name"),
            dataIndex: 'name',
            renderer: Ext.util.Format.htmlEncode,
            sortable: true,
            width: 230,
            editable: false
        };

        const languageConfig = {
            text: t('language'),
            sortable: true,
            dataIndex: "language",
            width: 80,
            editable: false
        };

        this.grid = Ext.create('Ext.grid.Panel', {
            title: this.config.title ? this.config.title : t("custom_metadata"),
            autoScroll: true,
            region: "center",
            iconCls: this.config.hasOwnProperty('iconCls') ? this.config.iconCls : "pimcore_material_icon_metadata pimcore_material_icon",
            bodyCls: "pimcore_editable_grid",
            trackMouseOver: true,
            store: store,
            columnLines: true,
            stripeRows: true,
            columns: {
                items: [
                    {
                        text: t("type"),
                        dataIndex: 'type',
                        editable: false,
                        width: 40,
                        renderer: this.getTypeRenderer.bind(this),
                        sortable: true
                    },
                    nameConfig,
                    languageConfig,
                    {
                        text: t("value"),
                        dataIndex: 'data',
                        getEditor: this.getCellEditor.bind(this),
                        editable: false,
                        renderer: this.getCellRenderer.bind(this),
                        listeners: {
                            "mousedown": this.cellMousedown.bind(this)
                        },
                        flex: 1
                    },
                    {
                        xtype: 'actioncolumn',
                        menuText: t('open'),
                        width: 40,
                        items: [
                            {
                                tooltip: t('open'),
                                icon: "/bundles/pimcoreadmin/img/flat-color-icons/open_file.svg",
                                handler: function (grid, rowIndex) {
                                    const rec = grid.getStore().getAt(rowIndex);
                                    if (typeof pimcore.asset.metadata.tags[rec.get('type')] !== "undefined") {
                                        pimcore.asset.metadata.tags[rec.get('type')].prototype.handleGridOpenAction(grid, rowIndex);
                                    }
                                }.bind(this),
                                getClass: function (v, meta, rec) {
                                    if (typeof pimcore.asset.metadata.tags[rec.get('type')] !== "undefined") {
                                        return pimcore.asset.metadata.tags[rec.get('type')].prototype.getGridOpenActionVisibilityStyle();
                                    }
                                }
                            }
                        ]
                    }
                ]
            }
        });

        this.grid.getView().on("refresh", this.updateRows.bind(this, "view-refresh"));
    },
    editorLayout: function () {

        this.dataProvider.setStore(this.asset.data.metadata);

        const updateListener = function (eventType, name, language, newValue, type, config, originator) {
            if (originator == this.grid.getId()) {
                // nothing to do
                return;
            }
            const store = this.grid.getStore();
            language = language || "";
            const existingIndex = store.findBy(function (record, id) {
                if (record.data.name == name && record.data.language == language) {
                    return true;
                }
                return false;
            }.bind(this));


            if (existingIndex != -1) {
                if (eventType == "remove") {
                    store.removeAt(existingIndex);
                } else {
                    const item = store.getAt(existingIndex);
                    item.set("data", newValue);
                }

            } else {
                const item = {
                    name: name,
                    language: language,
                    data: newValue,
                    type: type,
                    config: config
                };
                store.add(item);
            }
        }.bind(this);


        const customKey = new Ext.form.TextField({
            name: 'key',
            emptyText: t('name'),
            enableKeyEvents: true,
            listeners: {
                keyup: function (el) {
                    if (el.getValue().match(/[~]+/)) {
                        el.setValue(el.getValue().replace(/[~]/g, "---"));
                    }
                }
            }
        });

        const supportedTypes = pimcore.helpers.getAssetMetadataDataTypes("custom");
        const typeStore = [];

        for (let i = 0; i < supportedTypes.length; i++) {
            const type = supportedTypes[i];
            typeStore.push([type, t(type)]);
        }

        const customType = new Ext.form.ComboBox({
            name: "type",
            valueField: "id",
            displayField: 'name',
            store: typeStore,
            editable: false,
            triggerAction: 'all',
            mode: "local",
            width: 120,
            value: "input",
            emptyText: t('type')
        });

        const languagestore = [["", t("none")]];
        const websiteLanguages = pimcore.settings.websiteLanguages;
        let selectContent = "";
        for (let i = 0; i < websiteLanguages.length; i++) {
            selectContent = pimcore.available_languages[websiteLanguages[i]] + " [" + websiteLanguages[i] + "]";
            languagestore.push([websiteLanguages[i], selectContent]);
        }

        const customLanguage = new Ext.form.ComboBox({
            name: "language",
            store: languagestore,
            editable: false,
            triggerAction: 'all',
            mode: "local",
            width: 150,
            emptyText: t('language')
        });

        const modelName = 'pimcore.model.assetmetadata';
        if (!Ext.ClassManager.get(modelName)) {
            Ext.define(modelName, {
                    extend: 'Ext.data.Model',
                    fields: [
                        {
                            name: 'name',
                            convert: function (v, r) {
                                return v.replace(/[~]/g, "---");
                            }
                        }, "type", {
                            name: "data",
                            convert: function (v, r) {
                                const dataType = r.data.type;
                                if (typeof pimcore.asset.metadata.tags[dataType] !== "undefined") {
                                    if (typeof pimcore.asset.metadata.tags[dataType].prototype.convertPredefinedGridData === "function") {
                                        v = pimcore.asset.metadata.tags[dataType].prototype.convertPredefinedGridData(v, r);
                                    }
                                }
                                return v;
                            }
                        }, "language", "config",
                        {
                            name: "lastName",
                            persist: false,
                            convert: function (v, rec) {
                                return rec.data.name;
                            }.bind(this)
                        },
                        {
                            name: "lastLanguage",
                            persist: false,
                            convert: function (v, rec) {
                                return rec.data.language;
                            }.bind(this)
                        }

                    ]
                }
            );
        }


        const storeData = this.dataProvider.getDataAsArray();

        const store = new Ext.data.Store({
            model: modelName,
            data: storeData,
            listeners: {
                update: function (store, record, operation, modifiedFieldNames, details, eOpts) {
                    let newData = record.data.data;

                    const oldKey = record.data.lastName + "~" + record.data.lastLanguage;
                    const newKey = record.data.name + "~" + record.data.language;

                    if (oldKey != newKey) {
                        const oldRecord = {
                            name: record.data.lastName,
                            language: record.data.lastLanguage
                        };

                        this.dataProvider.remove(oldRecord, this.grid.getId());

                        record.set("lastName", record.data.name, {
                            silent: true
                        })

                        record.set("lastLanguage", record.data.language, {
                            silent: true
                        })
                    }


                    if (typeof pimcore.asset.metadata.tags[record.data.type] !== "undefined") {
                        newData = pimcore.asset.metadata.tags[record.data.type].prototype.marshal(newData);
                    }
                    this.dataProvider.update(record.data, newData, this.grid.getId());
                }.bind(this),
                remove: function (store, records, index, isMove, eOpts) {
                    for (let i = 0; i < records.length; i++) {
                        const record = records[i];
                        this.dataProvider.remove(record.data, this.grid.getId());
                    }
                }.bind(this),
                add: function (updateListener, store, records, index, eOpts) {
                    for (let i = 0; i < records.length; i++) {
                        const record = records[i];
                        // this.dataProvider.registerChangeListener(key, this.grid.getId(), updateListener);
                        this.dataProvider.update(record.data, record.data.data, this.grid.getId());
                    }
                }.bind(this, updateListener)
            }
        });

        this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
            clicksToEdit: 1,
            listeners: {
                beforeedit: function (editor, context, eOpts) {
                    //need to clear cached editors of cell-editing editor in order to
                    //enable different editors per row
                    editor.editors.each(function (e) {
                        try {
                            const fieldType = e.fieldInfo?.layout?.fieldtype;
                            if (fieldType === 'manyToManyRelation' || fieldType === 'multiselect') {
                                return;
                            }
                            // complete edit, so the value is stored when hopping around with TAB
                            e.completeEdit();
                            Ext.destroy(e);
                        } catch (exception) {
                            // garbage collector was faster
                            // already destroyed
                        }
                    });

                    editor.editors.clear();
                }
            }
        });

        const tbarItems = [
            {
                xtype: "tbtext",
                text: t('add') + " &nbsp;&nbsp;"
            }, customKey, customType, customLanguage, {
                xtype: "button",
                handler: this.addSetFromUserDefined.bind(this, customKey, customType, customLanguage),
                iconCls: "pimcore_icon_add"
            }
        ];

        if (!this.config.hideAddPredefinedButton) {
            tbarItems.push({
                xtype: "tbspacer",
                width: 20
            });
            tbarItems.push("-");
            tbarItems.push({
                xtype: "tbspacer",
                width: 20
            });

            let predefinedMetadataGroups = [];
            if (this.asset.data && this.asset.data.predefinedMetaDataGroups) {
                predefinedMetadataGroups = Ext.Array.map(this.asset.data.predefinedMetaDataGroups, function (predefinedMetadataGroup) {
                    return {
                        text: t(predefinedMetadataGroup), handler: function () {
                            this.handleAddPredefinedDefinitions(predefinedMetadataGroup);
                        }.bind(this)
                    };
                }.bind(this));
            }

            if (predefinedMetadataGroups.length > 0) {
                predefinedMetadataGroups.unshift('-');
                predefinedMetadataGroups.unshift({
                    text: t('ungrouped'), handler: function () {
                        this.handleAddPredefinedDefinitions('');
                    }.bind(this)
                });
            }

            tbarItems.push(
                new Ext.SplitButton({
                    text: t('add_predefined_metadata_definitions'),
                    handler: this.handleAddPredefinedDefinitions.bind(this, "default"),
                    menu: new Ext.menu.Menu({
                        items: predefinedMetadataGroups
                    }),
                    iconCls: "pimcore_icon_add"
                })
            );
        }

        const nameConfig = {
            text: t("name"),
            dataIndex: 'name',
            renderer: Ext.util.Format.htmlEncode,
            sortable: true,
            width: 230
        };

        if (!this.config.disableName) {
            nameConfig["getEditor"] = function () {
                return new Ext.form.TextField({
                    allowBlank: false
                });
            };
        }

        const languageConfig = {
            text: t('language'),
            sortable: true,
            dataIndex: "language",
            width: 80,
        };

        if (!this.config.disableLanguage) {
            languageConfig["getEditor"] = function () {
                return new Ext.form.ComboBox({
                    name: "language",
                    store: languagestore,
                    editable: false,
                    listConfig: {minWidth: 200},
                    triggerAction: 'all',
                    mode: "local"
                });
            };
        }

        this.grid = Ext.create('Ext.grid.Panel', {
            title: this.config.title ? this.config.title : t("custom_metadata"),
            autoScroll: true,
            region: "center",
            iconCls: this.config.hasOwnProperty('iconCls') ? this.config.iconCls : "pimcore_material_icon_metadata pimcore_material_icon",
            bodyCls: "pimcore_editable_grid",
            trackMouseOver: true,
            store: store,
            tbar: tbarItems,
            plugins: [
                this.cellEditing
            ],
            columnLines: true,
            stripeRows: true,
            columns: {
                items: [
                    {
                        text: t("type"),
                        dataIndex: 'type',
                        editable: false,
                        width: 40,
                        renderer: this.getTypeRenderer.bind(this),
                        sortable: true
                    },
                    nameConfig,
                    languageConfig,
                    {
                        text: t("value"),
                        dataIndex: 'data',
                        getEditor: this.getCellEditor.bind(this),
                        editable: true,
                        renderer: this.getCellRenderer.bind(this),
                        listeners: {
                            "mousedown": this.cellMousedown.bind(this)
                        },
                        flex: 1
                    },
                    {
                        xtype: 'actioncolumn',
                        menuText: t('open'),
                        width: 40,
                        items: [
                            {
                                tooltip: t('open'),
                                icon: "/bundles/pimcoreadmin/img/flat-color-icons/open_file.svg",
                                handler: function (grid, rowIndex) {
                                    const rec = grid.getStore().getAt(rowIndex);
                                    if (typeof pimcore.asset.metadata.tags[rec.get('type')] !== "undefined") {
                                        pimcore.asset.metadata.tags[rec.get('type')].prototype.handleGridOpenAction(grid, rowIndex);
                                    }
                                }.bind(this),
                                getClass: function (v, meta, rec) {
                                    if (typeof pimcore.asset.metadata.tags[rec.get('type')] !== "undefined") {
                                        return pimcore.asset.metadata.tags[rec.get('type')].prototype.getGridOpenActionVisibilityStyle();
                                    }
                                }
                            }
                        ]
                    },
                    {
                        xtype: 'actioncolumn',
                        menuText: t('delete'),
                        width: 40,
                        items: [{
                            tooltip: t('delete'),
                            icon: "/bundles/pimcoreadmin/img/flat-color-icons/delete.svg",
                            handler: function (grid, rowIndex) {
                                grid.getStore().removeAt(rowIndex);
                            }.bind(this)
                        }]
                    }
                ]
            }
        });
        this.grid.getView().on("refresh", this.updateRows.bind(this, "view-refresh"));
        this.dataProvider.registerGlobalChangeListener(this.grid.getId(), updateListener);
    },

    updateRows: function (event) {
        var rows = Ext.get(this.grid.getEl().dom).query(".x-grid-row");

        for (let i = 0; i < rows.length; i++) {
            try {
                var data = this.grid.getStore().getAt(i).data;

                if (in_array(data.name, this.disallowedKeys)) {
                    Ext.get(rows[i]).addCls("pimcore_properties_hidden_row");
                }

                if (typeof pimcore.asset.metadata.tags[data.type] !== "undefined") {
                    pimcore.asset.metadata.tags[data.type].prototype.updatePredefinedGridRow(this.grid, rows[i], data);
                }
            } catch (e) {
                console.log(e);
            }
        }
    },

    getTypeRenderer: function (value, metaData, record, rowIndex, colIndex, store) {
        return '<div class="pimcore_icon_' + Ext.util.Format.htmlEncode(value) + ' pimcore_property_grid_type_column" name="' + Ext.util.Format.htmlEncode(record.data.name) + '">&nbsp;</div>';
    },

    getCellRenderer: function (value, metaData, record, rowIndex, colIndex, store) {
        var data = store.getAt(rowIndex).data;
        var type = data.type;
        if (typeof pimcore.asset.metadata.tags[type] == "undefined") {
            type = "input";
        }
        return pimcore.asset.metadata.tags[type].prototype.getGridCellRenderer(value, metaData, record, rowIndex, colIndex, store);
    },

    addSetFromUserDefined: function (customKey, customType, customLanguage) {
        this.add(customKey.getValue(), customType.getValue(), false, customLanguage.getValue());
    },

    add: function (key, type, value, language) {

        var store = this.grid.getStore();

        // check for empty key & type
        if (key.length < 2 || type.length < 1) {
            Ext.MessageBox.alert(t("error"), t("name_and_key_must_be_defined"));
            return;
        }

        if (!value) {
            value = "";
        }

        if (!language) {
            language = "";
        }

        // check for duplicate name
        const duplicateIndex = store.findBy(function (record, id) {
            if (record.data.name.toLowerCase() == key.toLowerCase()) {
                if (String(record.data.language).toLowerCase() == language.toLowerCase()) {
                    return true;
                }
            }
            return false;
        });

        if (duplicateIndex >= 0) {
            Ext.MessageBox.alert(t("error"), t("name_already_in_use"));
            return;
        }

        store.add({
            name: key,
            data: value,
            type: type,
            language: language
        });
        this.grid.getView().refresh();
    },

    cellMousedown: function (grid, cell, rowIndex, cellIndex, e) {
        var store = grid.getStore();
        var record = store.getAt(rowIndex);
        let type = record.data.type;
        if (typeof pimcore.asset.metadata.tags[type] === "undefined") {
            type = "input";
        }
        pimcore.asset.metadata.tags[type].prototype.handleGridCellClick(grid, cell, rowIndex, cellIndex, e);
    },

    getCellEditor: function (record) {
        let type = record.data.type;
        if (typeof pimcore.asset.metadata.tags[type] === "undefined") {
            type = "input";
        }
        return pimcore.asset.metadata.tags[type].prototype.getGridCellEditor("custom", record);
    },

    commitChanges: function () {
        var store = this.grid.getStore();
        store.commitChanges();
    },

    handleAddPredefinedDefinitions: function (group) {
        Ext.Ajax.request({
            url: Routing.generate('pimcore_admin_settings_getpredefinedmetadata'),
            params: {
                type: "asset",
                subType: this.asset.type,
                group: group
            },
            success: this.doAddPredefinedDefinitions.bind(this)
        });
    },

    doAddPredefinedDefinitions: function (response) {
        var data = Ext.decode(response.responseText);
        data = data.data;
        var store = this.grid.getStore();
        var added = false;

        for (let i = 0; i < data.length; i++) {
            let item = data[i];
            let key = item.name || "";
            let language = item.language || "";

            if (!item.type) {
                continue;
            }

            var duplicateIndex = store.findBy(function (record, id) {
                if (record.data.name.toLowerCase() == key.toLowerCase()) {
                    if (String(record.data.language).toLowerCase() == language.toLowerCase()) {
                        return true;
                    }
                }
                return false;
            });

            if (duplicateIndex < 0) {
                let value = item.data;
                if (typeof pimcore.asset.metadata.tags[item.type] !== "undefined") {
                    value = pimcore.asset.metadata.tags[item.type].prototype.unmarshal(value);
                }

                let newRecord = {
                    name: key,
                    data: value,
                    type: item.type,
                    config: item.config,
                    language: language
                };

                store.add(newRecord);
                added = true;
            }
        }

        if (added) {
            this.grid.getView().refresh();
        }
    },

    getValues: function () {
        let values = this.dataProvider.getSubmitValues();
        let result = {
            values: values
        };

        return result;
    }
});
