# CiviCRM Inventory Field

![Screenshot](/images/screenshot.png)

Allows defining a custom 'select' field so that usage of select options is limited to once-per-event.

The extension is licensed under [GPL-3.0](LICENSE.txt).

## Usage
When editing or creating a custom field which is a) of type "Drop-down (select)" and b) in a Custom Field Group that applies to Participants, set the "Limit usage of each option per" field to "Event".

You may then optionally set the "Limit usage count" setting to any positive integer (default is 1), to limit the usages per event to that amount.

For fields so configured, this extension will prevent more than one participant per event from selecing any given value in the select options, in on-line registration forms. Once an option has been used by a participant at an event, it will be labeled "Unavailable" and disabled in on-line registration forms for that event.

Note: This setting has no effect on back-office paticipant management forms; therefore, when editing or creating participants through CiviCRM's back-office features, it is still possible to assign the same option to multiple participants.

## Requirements

* PHP v7.0+
* CiviCRM >= 5.0

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl com.joineryhq.inventoryfield@https://github.com/JoineryHQ/com.joineryhq.inventoryfield/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/JoineryHQ/com.joineryhq.inventoryfield.git
cv en inventoryfield
```

## Support
![screenshot](/images/joinery-logo.png)

Joinery provides services for CiviCRM including custom extension development, training, data migrations, and more. We aim to keep this extension in good working order, and will do our best to respond appropriately to issues reported on its [github issue queue](https://github.com/JoineryHQ/com.joineryhq.inventoryfield/issues). In addition, if you require urgent or highly customized improvements to this extension, we may suggest conducting a fee-based project under our standard commercial terms.  In any case, the place to start is the [github issue queue](https://github.com/JoineryHQ/com.joineryhq.inventoryfield/issues) -- let us hear what you need and we'll be glad to help however we can.

And, if you need help with any other aspect of CiviCRM -- from hosting to custom development to strategic consultation and more -- please contact us directly via https://joineryhq.com

