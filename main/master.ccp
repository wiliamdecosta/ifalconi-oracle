<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\main" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="trb" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Menu id="2" secured="False" sourceType="SQL" returnValueType="Number" connection="TRBConn" name="trbmenu" menuType="Horizontal" dataSource="SELECT * 
FROM V_MENU_DISPLAY
WHERE P_APPLICATION_ID = {p_application_id} 
ORDER BY LISTING_NO" idField="P_APP_MENU_ID" parentIdField="PARENT_ID" menuSourceType="DataSource" PathID="trbmenu" activeCollection="TableParameters" orderBy="LISTING_NO">
			<Components>
				<Link id="3" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Database" urlType="Relative" preserveParameters="GET" name="ItemLink" hrefSource="FILE_NAME" fieldSource="CODE" PathID="trbmenuItemLink">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="7" conditionType="Parameter" useIsNull="False" field="P_APPLICATION_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="p_application_id"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="8" tableName="V_MENU_DISPLAY" posLeft="10" posTop="10" posWidth="146" posHeight="168"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="11" parameterType="URL" variable="p_application_id" dataType="Float" parameterSource="p_application_id"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes>
				<Attribute id="9" name="Target" sourceType="DataField" source="FRAME"/>
				<Attribute id="10" name="Title" sourceType="Expression" source="&quot;&quot;"/>
			</Attributes>
			<MenuItems/>
			<Features/>
		</Menu>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="master.php" forShow="True" url="master.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
